<?php

class Order
{
    public static function Create(int $user_id, array $data): int
    {
        $db = MysqliDb::getInstance();
        return (int) $db->insert('orders', [
            'user_id' => $user_id,
            'json_data' => json_encode($data),
            'is_paid' => 0,
            'is_shipped' => 0
        ]);
    }

    public static function GetData(int $order_id): array
    {
        $db = MysqliDb::getInstance();
        $db->where('id', $order_id);
        $row = $db->getOne('orders');

        if ($row === null) {
            throw new Exception("Missing order ID = $order_id");
        }

        return json_decode($row['json_data'], true);
    }

    public static function Update(int $order_id, bool $is_paid, bool $is_shipped): void
    {
        $db = MysqliDb::getInstance();
        $db->where('id', $order_id);
        $row = $db->update('orders', [
            'is_paid' => $is_paid ? 1 : 0,
            'is_shipped' => $is_shipped ? 1 : 0
        ]);
    }
}
