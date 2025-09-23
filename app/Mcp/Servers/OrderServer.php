<?php

namespace App\Mcp\Servers;
use Laravel\Mcp\Server;

class OrderServer extends Server
{
    /**
     * The MCP server's name.
     */
    protected string $name = 'Order Server';

    /**
     * The MCP server's version.
     */
    protected string $version = '0.0.1';

    /**
     * The MCP server's instructions for the LLM.
     */
    protected string $instructions = 'This server exposes order-related tools. Prefer structured tools over free-form prompts when available. Use list_orders to browse, get_order to fetch details, create_order to make a new order, and update_order_status to change status.';

    /**
     * The tools registered with this MCP server.
     *
     * @var array<int, class-string<\Laravel\Mcp\Server\Tool>>
     */
    protected array $tools = [
        \App\Mcp\Tools\OrderTool::class,
        \App\Mcp\Tools\ListOrders::class,
        \App\Mcp\Tools\GetOrder::class,
        \App\Mcp\Tools\CreateOrder::class,
        \App\Mcp\Tools\UpdateOrderStatus::class,
    ];

    /**
     * The resources registered with this MCP server.
     *
     * @var array<int, class-string<\Laravel\Mcp\Server\Resource>>
     */
    protected array $resources = [
        //
    ];

    /**
     * The prompts registered with this MCP server.
     *
     * @var array<int, class-string<\Laravel\Mcp\Server\Prompt>>
     */
    protected array $prompts = [
        \App\Mcp\Prompts\ChatOrderPrompt::class,
    ];
}
