<?php

namespace TelegramNotifier;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

class Telegram
{
    /**
     * @param $message
     * @return string|JsonResponse
     */
    public static function sendMessage($message, $botToken, $chatId, $parseMode = null): string|JsonResponse
    {
        $client = new Client();

        try {

            $formParams = [
                'chat_id' => $chatId,
                'text' => $message,
            ];

            $validParseModes = ['HTML', 'Markdown', 'MarkdownV2'];
            if (!empty($parseMode)) {
                if (!in_array($parseMode, $validParseModes)) {
                    throw new InvalidArgumentException("Invalid parse mode. Allowed values are: " . implode(', ', $validParseModes));
                }
                $formParams['parse_mode'] = $parseMode;
            }

            $response = $client->post('https://api.telegram.org/bot' . $botToken . '/sendMessage', [
                'form_params' => $formParams,
            ]);

            return response()->json($response->getBody()->getContents());

        } catch (GuzzleException $e) {
            error_log($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
