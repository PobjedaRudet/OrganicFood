<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mcp\Prompts\ChatOrderPrompt;

class ChatbotController extends Controller
{
    public function message(Request $request)
    {
        $userMessage = (string) $request->input('message', '');

        // Koristi isti prompt kao MCP server, ali lokalno u aplikaciji
        $prompt = app(ChatOrderPrompt::class);
        $reply = $prompt->runMessage($userMessage);

        return response()->json(['reply' => $reply]);
    }
}
