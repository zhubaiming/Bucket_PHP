<?php

declare(strict_types=1);

namespace Hongyi\Bucket\Plugins\Qiniu;

use Hongyi\Bucket\Enums\Qiniu\HttpEnum;
use Hongyi\Designer\Contracts\PluginInterface;
use Hongyi\Designer\Patchwerk;

class BeginPlugin implements PluginInterface
{
    public function handle(Patchwerk $patchwerk, \Closure $next): Patchwerk
    {
        $patchwerk->setHttpEnum(HttpEnum::OK);

        return $next($patchwerk);
    }
}
