<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'P';
    case APPROVED = 'A';
    case REJECTED = 'R';
    case CANCELLED = 'C';
    case INPROGRESS = 'I';
    case FINISHED = 'F';
    case DELIVERING = 'D';
    case DELIVERED = 'E';

    public function toArray(): array
    {
        return [
            self::PENDING => 'Pendente',
            self::APPROVED => 'Aprovado',
            self::REJECTED => 'Rejeitado',
            self::CANCELLED => 'Cancelado',
            self::INPROGRESS => 'Em andamento',
            self::FINISHED => 'Finalizado',
            self::DELIVERING => 'Entregando',
            self::DELIVERED => 'Entregue',
        ];
    }

    public function description(): string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::APPROVED => 'Aprovado',
            self::REJECTED => 'Rejeitado',
            self::CANCELLED => 'Cancelado',
            self::INPROGRESS => 'Em andamento',
            self::FINISHED => 'Finalizado',
            self::DELIVERING => 'Entregando',
            self::DELIVERED => 'Entregue',
        };
    }

    public function original(): string
    {
        return match ($this) {
            self::PENDING => 'P',
            self::APPROVED => 'A',
            self::REJECTED => 'R',
            self::CANCELLED => 'C',
            self::INPROGRESS => 'I',
            self::FINISHED => 'F',
            self::DELIVERING => 'D',
            self::DELIVERED => 'E', 
        };
    }
}
