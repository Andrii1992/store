<?php

class Session
{
    public static function ValidateSession(string $token, &$user_id): bool
    {
        $token_hash = hash(TOKEN_HASH_ALG, $token);
        $db = MysqliDb::getInstance();
        $db->where('token_hash', $token_hash);
        $db->where('expire_time', time(), '>'); // session token
        $row = $db->getOne('sessions');

        if ($row === null) {
            return false;
        }

        $user_id = $row['user_id'];

        return true;
    }

    public static function CreateSession(int $user_id, int $expire_days, &$token): bool
    {
        $token = bin2hex(random_bytes(16));
        $token_hash = hash(TOKEN_HASH_ALG, $token);
        $expire_time = time() + $expire_days * 24 * 60 * 60;
        $db = MysqliDb::getInstance();
        $db->insert('sessions', [
            'user_id' => $user_id,
            'token_hash' => $token_hash,
            'create_time' => time(),
            'expire_time' => $expire_time
        ]);

        return true;
    }

    public static function DestroySession(string $token): bool
    {
        $token_hash = hash(TOKEN_HASH_ALG, $token);
        $db = MysqliDb::getInstance();
        $db->where('token_hash', $token_hash);
        $db->delete('sessions');

        return true;
    }

    public static function DestroySessionsByUser(int $user_id): bool
    {
        $db = MysqliDb::getInstance();
        $db->where('token_hash', $user_id);
        $db->delete('sessions');

        return true;
    }
}
