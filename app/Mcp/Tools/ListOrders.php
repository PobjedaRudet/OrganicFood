<?php

namespace App\Mcp\Tools;

use Illuminate\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class ListOrders extends Tool
{
    protected string $name = 'list_orders';
    protected string $description = 'Lists recent orders with optional status filter and limit.';

    public function handle(Request $request): Response
    {
        if (!class_exists('App\\Models\\Order')) {
            return Response::text('Order model not available. Did you run migrations?');
        }

        $status = $request['status'] ?? null;
        $limit = (int) ($request['limit'] ?? 5);
        $limit = $limit > 0 && $limit <= 50 ? $limit : 5;

        $query = \App\Models\Order::query();
        if ($status) {
            $query->where('status', strtolower((string) $status));
        }
        $orders = $query->latest()->take($limit)->get(['id','customer_name','status','total']);

        if ($orders->isEmpty()) {
            return Response::text('No orders found.');
        }

        $lines = $orders->map(fn($o) => "#{$o->id} {$o->customer_name} - {$o->status} ({$o->total})")->implode("\n");
        return Response::text("Last {$limit} orders".($status?" with status '{$status}'":"").":\n".$lines);
    }

    /**
     * @return array<string, JsonSchema>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'status' => $schema->string()->description('Optional status to filter by, e.g. pending, shipped, delivered.'),
            'limit' => $schema->integer()->description('How many orders to return (1-50). Default 5.'),
        ];
    }
}
