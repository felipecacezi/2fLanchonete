<?php

namespace App\Helpers;

class LivewireToSweetAlertMessages
{
    public function alert(): array
    {
        return [
            'title' => 'Pedido Aceito!',
            'text' => "O pedido #{$id} foi aceito com sucesso!",
            'icon' => 'success',
            'confirmButtonText' => 'OK'
        ];
    }
}