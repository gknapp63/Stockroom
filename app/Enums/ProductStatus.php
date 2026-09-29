<?php

namespace App\Enums;

enum ProductStatus: string
{
    case OnOrder = 'onorder';
    case InStock = 'instock';
    case OutOfStock = 'outofstock';

    /**
     * The human-friendly name shown in the UI.
     */
    public function label(): string
    {
        return match ($this) {
            self::OnOrder => 'On Order',
            self::InStock => 'In Stock',
            self::OutOfStock => 'Out of Stock',
        };
    }

    /**
     * The badge colour used for this status.
     */
    public function color(): string
    {
        return match ($this) {
            self::OnOrder => 'zinc',
            self::InStock => 'green',
            self::OutOfStock => 'red',
        };
    }

    /**
     * Every status as [value => label], handy for select inputs.
     *
     * @return array<string, string>
     */
    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $status) => [$status->value => $status->label()])
            ->all();
    }
}
