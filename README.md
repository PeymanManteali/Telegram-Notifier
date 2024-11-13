
# Telegram Notifier

Telegram Notifier is a Laravel package for sending messages to Telegram via the Telegram Bot API. This package provides an easy way to integrate Telegram notifications in your Laravel application.

## Requirements

- PHP 8.0 or higher
- Laravel 11
- Guzzle HTTP client

## Installation

To install the package, use Composer:

```bash
composer require peyman-manteali/telegram-notifier
```

## Usage

After installation, you can use the `Telegram` class to send messages to a Telegram chat.

### Example

```php
use TelegramNotifier\Telegram;

$message = "Hello, this is a test message!";
$botToken = "your_bot_token";
$chatId = "your_chat_id";

// Optional: specify the parse mode (HTML, Markdown, MarkdownV2)
$parseMode = "HTML";

$response = Telegram::sendMessage($message, $botToken, $chatId, $parseMode);
```

### Parameters

- **`$message`**: The message text to send to Telegram.
- **`$botToken`**: Your Telegram bot token.
- **`$chatId`**: The chat ID where the message should be sent.
- **`$parseMode`** (optional): Defines the formatting style for the message. Supported values are:


  - **HTML**
  - **Markdown**
  - **MarkdownV2**

### Error Handling

If an error occurs while sending the message, the function will return a JSON response with the error message and a 500 status code.

## License

This package is open-source and licensed under the MIT License.
