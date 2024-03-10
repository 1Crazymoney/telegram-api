<?php

declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Type\Interfaces\DataObject;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @author  Юдов Никита yudov.nikita@bk.ru
 *
 * Этот объект представляет собой анимированный смайлик, отображающий случайное значение.
 *
 * @see    https://core.telegram.org/bots/api#dice
 */
interface DiceInterface
{
    /**
     * Эмодзи, на которых основана анимация броска игральных костей.
     */
    public function getEmoji(): string;

    /**
     * Значение кубика: от 1 до 6 для базовых смайлов «🎲», «🎯» и «🎳», от 1 до 5 для базовых смайлов «🏀»
     * и «⚽», от 1 до 64 для базовых смайлов «🎰».
     */
    public function getValue(): string;
}
