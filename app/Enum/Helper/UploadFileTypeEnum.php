<?php

namespace App\Enum\Helper;

enum UploadFileTypeEnum: string
{
    case IMAGE = 'image';
    case DATA  = 'data';

    public function mimes(): string
    {
        return match ($this) {
            self::IMAGE => 'mimes:jpeg,jpg,png,gif',
            self::DATA  => 'mimes:json,csv,xml',
            default => 'mimes:jpeg,jpg',
        };
    }
}
