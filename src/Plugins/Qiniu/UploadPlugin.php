<?php

declare(strict_types=1);

namespace Hongyi\Bucket\Plugins\Qiniu;

use Hongyi\Designer\Contracts\PluginInterface;
use Hongyi\Designer\Packers\FormDataPacker;
use Hongyi\Designer\Patchwerk;
use Hongyi\Bucket\Services\Qiniu;

class UploadPlugin implements PluginInterface
{
    public function handle(Patchwerk $patchwerk, \Closure $next): Patchwerk
    {
        $patchwerk->setPacker(new FormDataPacker());

        $config = Qiniu::getConfig();

        $patchwerk->mergeParameters([
            '_method' => 'POST',
            '_url' => str_replace('[prefix]', $config['region']['up'], Qiniu::RESOURCE_UP_URL),
            '_headers' => ['User-Agent' => 'Bucket qiniu-kodo']
        ]);

        return $next($patchwerk);
    }
}
