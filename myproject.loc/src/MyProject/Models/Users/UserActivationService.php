<?php

namespace MyProject\Models\Users;

use MyProject\Exceptions\UserActivationException;
use MyProject\Services\Db;

class UserActivationService
{
    private const TABLE_NAME = 'users_activation_codes';

    public static function createActivationCode(User $user): string
    {
        // Генерируем случайную последовательность символов, о функциях почитайте в документации
        $code = bin2hex(random_bytes(16));

        $db = Db::getInstance();
        $db->query(
            'INSERT INTO ' . self::TABLE_NAME . ' (user_id, code) VALUES (:user_id, :code)',
            [
                'user_id' => $user->getId(),
                'code' => $code
            ]
        );

        return $code;
    }

    public static function checkActivationCode(User $user, string $code): bool
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM `' . self::TABLE_NAME . '` WHERE `user_id` = :user_id AND `code` = :code',
            [
                'user_id' => $user->getId(),
                'code' => $code
            ]
        );

        if (!$result)
        {
            throw new UserActivationException('Ошибка активации. Проверочный код не валидный.');
        }

        return !empty($result);
    }

    public static function deleteActivationCode(int $userId, string $activationCode): void
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . self::TABLE_NAME . '` WHERE `user_id` = :userId AND `code` = :activationCode;', [
                ':userId' => $userId,
                ':activationCode' => $activationCode,
            ]
        );
    }
}