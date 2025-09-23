<?php

namespace App\Mcp\Tools;

use Illuminate\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class GetOrder extends Tool
{
    protected string $name = 'get_order';
    protected string $description = 'Fetch a single order by numeric ID.';

    public function handle(Request $request): Response
    {
        if (!class_exists('App\\Models\\Order')) {
            return Response::text('Order model not available. Did you run migrations?');
        }

        $id = (int) ($request['id'] ?? 0);
        if ($id <= 0) {
            return Response::text('Missing or invalid id.');
        }

        $order = \App\Models\Order::find($id);
        if (!$order) {
            return Response::text("Order #{$id} not found.");
        }

        $data = [
            'id' => $order->id,
            'customer_name' => $order->customer_name,
            'status' => $order->status,
            'total' => $order->total,
            'product_name' => $order->product_name,
            'quantity' => $order->quantity,
            'created_at' => (string) $order->created_at,
        ];

        return Response::json($data);
    }

    /**
     * @return array<string, JsonSchema>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'id' => $schema->integer()->description('Order numeric ID.'),
        ];
    }
}
