<?php

namespace App\Mcp\Tools;

use Illuminate\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class CreateOrder extends Tool
{
    protected string $name = 'create_order';
    protected string $description = 'Create a new order with customer, product and quantity.';

    public function handle(Request $request): Response
    {
        if (!class_exists('App\\Models\\Order')) {
            return Response::text('Order model not available. Did you run migrations?');
        }

        $customer = trim((string) ($request['customer_name'] ?? ''));
        $product = trim((string) ($request['product_name'] ?? ''));
        $qty = (int) ($request['quantity'] ?? 1);
        $total = (float) ($request['total'] ?? 0);

        if ($customer === '' || $product === '' || $qty <= 0) {
            return Response::text('Missing required fields: customer_name, product_name, quantity (>0).');
        }

        $order = new \App\Models\Order([
            'customer_name' => $customer,
            'product_name' => $product,
            'quantity' => max(1, $qty),
            'status' => 'pending',
            'total' => max(0, $total),
        ]);
        $order->save();

        return Response::json([
            'message' => "Created order #{$order->id}.",
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
            'customer_name' => $schema->string()->description('Customer full name.'),
            'product_name' => $schema->string()->description('Product name.'),
            'quantity' => $schema->integer()->description('Quantity (>0).'),
            'total' => $schema->number()->description('Optional total amount. Default 0.'),
        ];
    }
}
