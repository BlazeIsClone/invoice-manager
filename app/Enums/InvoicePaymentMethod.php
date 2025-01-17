<?php

namespace App\Enums;

use Illuminate\Support\Facades\Blade;

enum InvoicePaymentMethod: int
{
        // case CARD = 0;
    case CASH = 1;
    case BANK_TRANSFER = 2;

    /**
     * Get the human readable name.
     */
    public function getName(): string
    {
        return match ($this) {
            // self::CARD => 'Card',
            self::CASH => 'Cash',
            self::BANK_TRANSFER => 'Bank Transfer',
            default => 'Not known',
        };
    }

    /**
     * Select options for rendering a dropdown.
     */
    public static function toSelectOptions(): array
    {
        return array_map(fn($enum) => (object) [
            'name' => $enum->getName(),
            'value' => $enum->value
        ], self::cases());
    }

    /**
     * Bootstrap badge HTML representation.
     */
    public static function toBadge(Self $status): string
    {
        $classes = [
            // self::CARD->value => 'badge badge-info',
            self::CASH->value => 'badge badge-success',
            self::BANK_TRANSFER->value => 'badge badge-info',
        ];

        return Blade::render('<span class="{{ $class }}">{{ $status->getName() }}</span>', [
            'class' => $classes[$status->value],
            'status' => $status
        ]);
    }
}
