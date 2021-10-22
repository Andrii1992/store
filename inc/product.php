<?php

class Product
{
    private $_product_id;
    private $_product_data;

    public function __construct(int  $product_id)
    {
        $this->_product_id = $product_id;
        $this->UpdateData();
    }

    private function UpdateData(): void
    {
        $db = MysqliDb::getInstance();
        $db->where('id', $this->_product_id);
        $this->_product_data = $db->getOne('products');

        if ($this->_product_data === null) {
            throw new Exception("Product width  ID = {$this->_product_id} not found");
        }
    }

    public function GetData(): array
    {
        return $this->_product_data;
    }

    public function DecQuantity(): bool
    {
        $db = MysqliDb::getInstance();
        $db->where('id', $this->_product_id);
        return $db->update('products',[
            'quantity' => $db->dec()
        ]);
    }
}
