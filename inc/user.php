<?php

class User
{

    private $_user_data;
    private $_user_id;

    public function __construct(int  $user_id)
    {
        $this->_user_id = $user_id;
        $this->UpdateData();
    }

    private function UpdateData(): void
    {
        $db = MysqliDb::getInstance();
        $db->where('id', $this->_user_id);
        $this->_user_data = $db->getOne('users');

        if ($this->_user_data === null) {
            throw new Exception("User width  ID = {$this->_user_id} not found");
        }
    }

    public function GetData(): array
    {
        return $this->_user_data;
    }
}
