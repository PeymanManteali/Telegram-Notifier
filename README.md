# Telegram Notifier

Telegram Notifier is a simple Laravel package to send messages to a Telegram chat using the Telegram Bot API.

## Installation

Install the package via composer:

```bash
composer require your-username/telegram-notifier
```

## Usage

You can use the `TelegramService` class to send messages:

```php
use TelegramNotifier\src\TelegramService;

$message = "Hello, this is a test message!";
$botToken = "your_bot_token";
$chatId = "your_chat_id";

$response = TelegramService::sendMessage($message, $botToken, $chatId);
```

You can also specify an optional `parse_mode` parameter for Telegram message formatting:

```php
$response = TelegramService::sendMessage($message, $botToken, $chatId, 'Markdown');
```

## License

This package is open-source and licensed under the MIT License.
