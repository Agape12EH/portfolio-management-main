<?php

namespace App\Enums;

enum CustomerType: string {
    case NATURAL = '0';
    case FISCALIA = '1';
    case CODEUDOR = '2';

    public static function toArray() {
        return [
            self::NATURAL,
            self::FISCALIA,
            self::CODEUDOR,
        ];
    }
}
