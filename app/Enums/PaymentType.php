<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentType: string implements HasLabel
{
    case CASH = 'Cash';
    case CREDIT = 'Credit';
    public function getLabel(): string
   {
    return match ($this){
        self::CASH => 'Cash',
        self::CREDIT => 'Credit',
    };
    
   }
}
