<?php

namespace App\Mcp\Prompts;

use Illuminate\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Prompt;

class ChatOrderPrompt extends Prompt
{
    /**
     * Prompt name exposed to MCP clients.
     */
    protected string $name = 'chat_order';

    /**
     * Description of what this prompt does.
     */
    protected string $description = 'Odgovara na pitanja vezana za narudžbe (status, detalji) i po potrebi pristupa bazi.';

    /**
     * Handle prompt execution for MCP clients.
     */
    public function handle(Request $request): Response
    {
        $message = (string) ($request['user_message'] ?? '');
        return Response::text($this->runMessage($message));
    }

    /**
     * JSON schema for expected input.
     *
     * @return array<string, \Illuminate\JsonSchema\JsonSchema>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'user_message' => $schema->string()->description('Korisnička poruka / pitanje za chatbot'),
        ];
    }

    /**
     * Shared logic used by both MCP and in-app chatbot.
     */
    public function runMessage(string $message): string
    {
        $text = trim($message);
        if ($text === '') {
            return 'Unesite pitanje vezano za narudžbe. Primjer: "Status narudžbe 123".';
        }

        // 0) Eksplicitno: "Status narudžbe 123" (uhvati različite nastavke)
        if (preg_match('/status\s+narud(z|ž)b\p{L}*\s*#?\s*(\d+)/iu', $text, $m)) {
            $orderId = (int) ($m[2] ?? 0);
            if ($orderId > 0 && class_exists('App\\Models\\Order')) {
                $order = \App\Models\Order::find($orderId);
                if ($order) {
                    $status = $order->status ?? 'nepoznat';
                    return "Status narudžbe #{$orderId}: {$status}.";
                }
                return "Nisam pronašao narudžbu #{$orderId}. Možete li provjeriti ID?";
            }
            return 'Molim potvrdite ID narudžbe (npr. "status narudžbe 123").';
        }

        // 1) Prikaži zadnjih N narudžbi (default 5)
        if (preg_match('/zadnj(e|ih)\s*(\d+)?\s*narud(z|ž)b(e|i)/iu', $text, $m)) {
            $limit = isset($m[2]) && (int)$m[2] > 0 ? (int)$m[2] : 5;
            if (!class_exists('App\\Models\\Order')) {
                return "Mod informacija: Order model nije dostupan.";
            }
            $orders = \App\Models\Order::latest()->take($limit)->get(['id','customer_name','status','total']);
            if ($orders->isEmpty()) {
                return "Nema narudžbi.";
            }
            $lines = $orders->map(fn($o) => "#{$o->id} {$o->customer_name} - {$o->status} ({$o->total})")->implode("\n");
            return "Zadnjih {$limit} narudžbi:\n".$lines;
        }

        // 2) Prikaži narudžbe sa statusom X (npr. isporučeno)
        if (preg_match('/narud(z|ž)be\s+sa\s+statusom\s+([\p{L}0-9_-]+)/iu', $text, $m)) {
            $status = strtolower($m[2]);
            if (!class_exists('App\\Models\\Order')) {
                return "Mod informacija: Order model nije dostupan.";
            }
            $orders = \App\Models\Order::where('status', $status)->latest()->take(10)->get(['id','customer_name','status','total']);
            if ($orders->isEmpty()) {
                return "Nema narudžbi sa statusom '{$status}'.";
            }
            $lines = $orders->map(fn($o) => "#{$o->id} {$o->customer_name} - {$o->status} ({$o->total})")->implode("\n");
            return "Narudžbe sa statusom '{$status}':\n".$lines;
        }

        // 3) Kreiraj novu narudžbu [za] [ime], [proizvod], [količina]
        //    Podržava i varijantu bez "za": "Kreiraj novu narudžbu Ahmet, Banana, 1"
        if (preg_match('/kreiraj\s+(?:novu\s+)?narud(z|ž)bu\s+(?:za\s+)?([^,]+),\s*([^,]+),\s*(\d+)/iu', $text, $m)) {
            if (!class_exists('App\\Models\\Order')) {
                return "Mod informacija: Order model nije dostupan.";
            }
            $customer = trim($m[2]);
            $product = trim($m[3]);
            $qty = max(1, (int)$m[4]);

            $order = new \App\Models\Order([
                'customer_name' => $customer,
                'product_name' => $product,
                'quantity' => $qty,
                'status' => 'pending',
                'total' => 0,
            ]);
            $order->save();
            return "Kreirana je nova narudžba #{$order->id} za {$customer} ({$product} x{$qty}). Status: {$order->status}.";
        }

        // Pokušaj izvući ID narudžbe iz poruke (prihvati bilo koji nastavak: narudžb+e/a/i...)
        if (preg_match('/(narud(z|ž)b\p{L}*|order)\s*#?\s*(\d+)/iu', $text, $m)) {
            $orderId = (int) ($m[3] ?? 0);
            // Use optional Order model if it exists
            if ($orderId > 0 && class_exists('App\\Models\\Order')) {
                /** @var class-string $orderClass */
                $orderClass = 'App\\Models\\Order';
                $order = $orderClass::find($orderId);
                if ($order) {
                    $status = $order->status ?? 'nepoznat';
                    return "Status narudžbe #{$orderId}: {$status}.";
                }
                return "Nisam pronašao narudžbu #{$orderId}. Možete li provjeriti ID?";
            }
            return "Molim potvrdite ID narudžbe (npr. 'status narudžbe 123').";
        }

        // Ostali upiti - proširiti po potrebi
        if (preg_match('/status/i', $text)) {
            return 'Ako imate ID narudžbe, napišite: "Status narudžbe 123".';
        }

        return 'Mogu pomoći sa statusom i detaljima narudžbi. Primjer: "Status narudžbe 123".';
    }
}
