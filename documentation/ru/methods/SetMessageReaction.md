# Метод setMessageReaction

[<<< Назад](./../../)

## Общее

Ссылка: https://core.telegram.org/bots/api#setmessagereaction

Описание:
Используйте этот метод, чтобы изменить выбранные реакции на сообщение. На сервисные сообщения невозможно отреагировать. Сообщения, автоматически пересылаемые из канала в группу обсуждений, имеют те же реакции, что и сообщения в канале. Возвращает True в случае успеха.

| Параметр   | Тип                                                               | Обязательный | Описание                                                                                                                                                                                                                                                                                                                           |
|------------|-------------------------------------------------------------------|--------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| chat_id    | int/string                                                        | да           | Уникальный идентификатор целевого чата или имя пользователя целевого канала (в формате @channelusername).                                                                                                                                                                                                                          |
| message_id | int                                                               | да           | Идентификатор целевого сообщения. Если сообщение принадлежит медиа-группе, реакция устанавливается на первое неудаленное сообщение в группе.                                                                                                                                                                                       |
| reaction   | [ReactionType](https://core.telegram.org/bots/api#reactiontype)[] | нет          | Сериализованный в формате JSON список типов реакций, которые можно задать для сообщения. В настоящее время, как не премиум-пользователи, боты могут настроить до одной реакции на сообщение. Можно использовать собственную реакцию эмодзи, если она либо уже присутствует в сообщении, либо явно разрешена администраторами чата. |
| is_big     | bool                                                              | нет          | Передайте True, чтобы задать реакцию с большой анимацией.                                                                                                                                                                                                                                                                          |


## Пример

Ссылка: https://github.com/PHPTCloud/telegram-api/blob/master/examples/SetMessageReactionMethodExample.php

```php
<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// Загружаем переменные из .env
$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__ . '/.env');

$token = $_ENV['TELEGRAM_BOT_TOKEN'];
$chatId = $_ENV['TELEGRAM_CHAT_ID'];
$groupChatId = $_ENV['TELEGRAM_GROUP_CHAT_ID'];

// Инициализируем менеджер для интеграции с Telegram API
$manager = PHPTCloud\TelegramApi\TelegramApiManagerFactory::create($token);
$messageBuilder = new PHPTCloud\TelegramApi\Argument\Builder\MessageArgumentBuilder();

$message = $manager->sendMessage(
    $messageBuilder->setChatId($chatId)
        ->setText('Простое текстовое сообщение.')
        ->build(),
);

$isOk = $manager->setMessageReaction(
    new \PHPTCloud\TelegramApi\Argument\DataObject\SetMessageReactionArgument(
        $chatId,
        $message->getMessageId(),
        [
            new \PHPTCloud\TelegramApi\Argument\DataObject\ReactionTypeEmojiArgument('🔥'),
        ],
        false,
    ),
);
dump($isOk);
```
