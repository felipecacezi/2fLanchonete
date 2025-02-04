<?php

namespace App\Enums;

enum PaymentMethodEnum: string
{
    case CARD = 'C';    
    case PIX = 'P';
    case MONEY = 'D';

    public static function toArray(): array
    {
        return [
            self::CARD => 'Crédito/Débito',
            self::PIX => 'Pix',
            self::MONEY => 'Dinheiro',
        ];
    }

    public function description(): string
    {
        return match ($this) {
            self::CARD => 'Crédito/Débito',
            self::PIX => 'Pix',
            self::MONEY => 'Dinheiro'
        };
    }
}