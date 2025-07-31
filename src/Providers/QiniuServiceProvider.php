<?php

declare(strict_types=1);

namespace Hongyi\Bucket\Providers;

use Hongyi\Bucket\Services\Qiniu;
use Hongyi\Designer\Contracts\ServiceProviderInterface;
use Hongyi\Designer\Vaults;

class QiniuServiceProvider implements ServiceProviderInterface
{
    public function register(mixed $data = null): void
    {
        Vaults::set('qiniu', new Qiniu());
    }
}
