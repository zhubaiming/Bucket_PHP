<?php

declare(strict_types=1);

namespace Hongyi\Bucket\Enums\Qiniu;

use Hongyi\Designer\Contracts\HttpEnumInterface;

enum HttpEnum: int implements HttpEnumInterface
{
    case OK = 200;

    /**
     * @inheritDoc
     */
    public static function isSuccess(int $code): bool
    {
        return match ($code) {
            self::OK->value => true,
            default => false
        };
    }
}
