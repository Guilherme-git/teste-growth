<?php

namespace App\Enum;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Colors\Color;

enum ProductsEnum : string implements HasLabel, HasColor
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ACTIVE => "success",
            self::INACTIVE =>  "danger",
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => "Ativo",
            self::INACTIVE => "Inativo",
        };
    }
}
