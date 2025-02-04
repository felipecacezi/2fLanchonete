<?php

namespace App\Helpers;

class OrderHashing
{
    private $orderClientRegister;
    private $orderZipcode;
    private $orderWhatsapp;

    public function __construct(
        string $orderClientRegister,
        string $orderZipcode,
        string $orderWhatsapp
    ){
        $this->orderClientRegister = $orderClientRegister;
        $this->orderZipcode = $orderZipcode;
        $this->orderWhatsapp = $orderWhatsapp;  
    }

    public function getHash()
    {
        $data = $this->orderClientRegister
            . '|' . $this->orderZipcode
            . '|' . $this->orderWhatsapp
            . '|' . date('YmdHis');

        return hash_hmac('sha256', $data, 'your_secret_key');
    }
}