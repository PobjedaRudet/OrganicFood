<?php

namespace App\Mcp\Tools;

use Illuminate\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class UpdateOrderStatus extends Tool
{
    protected string $name = 'update_order_status';
    protected string $description = 'Update the status of an existing order.';

    public function handle(Request $request): Response
    {
        if (!class_exists('App\\Models\\Order')) {
            return Response::text('Order model not available. Did you run migrations?');
        }

        $id = (int) ($request['id'] ?? 0);
        $status = trim((string) ($request['status'] ?? ''));
        if ($id <= 0 || $status === '') {
            return Response::text('Missing required fields: id, status.');
        }

        $allowed = ['pending','processing','shipped','delivered','canceled'];
        $status = strtolower($status);
        if (!in_array($status, $allowed, true)) {
            return Response::text("Invalid status. Allowed: ".implode(', ', $allowed));
        }

        $order = \App\Models\Order::find($id);
        if (!$order) {
            return Response::text("Order #{$id} not found.");
        }

        $order->status = $status;
        $order->save();

        return Response::json([
            'message' => "Order #{$order->id} status updated to {$order->status}.",
            'order_id' => $order->id,
            'status' => $order->status,
        ]);
    }

    /**
     * @return array<string, JsonSchema>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'id' => $schema->integer()->description('Order ID.'),
            'status' => $schema->string()->description('New status: pending, processing, shipped, delivered, canceled.'),
        ];
    }
}
