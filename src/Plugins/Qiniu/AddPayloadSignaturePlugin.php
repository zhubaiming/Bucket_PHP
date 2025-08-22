<?php

declare(strict_types=1);

namespace Hongyi\Bucket\Plugins\Qiniu;

use Hongyi\Bucket\Services\Qiniu;
use Hongyi\Designer\Contracts\PluginInterface;
use Hongyi\Designer\Patchwerk;

class AddPayloadSignaturePlugin implements PluginInterface
{
    public function handle(Patchwerk $patchwerk, \Closure $next): Patchwerk
    {
        $parameters = $patchwerk->getParameters();

        $signature = $this->getSignature($parameters['key']);

        $patchwerk->mergeParameters(['token' => $signature]);

        return $next($patchwerk);
    }

    private function getSignature($key): string
    {
        $config = Qiniu::getConfig();

        $putPolicy = json_encode([
            'scope' => "resources-wxr:{$key}",
            'deadline' => time() + 3600
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $encodedPutPolicy = str_replace(['+', '/'], ['-', '_'], base64_encode($putPolicy));

        $sign = hash_hmac('sha1', $encodedPutPolicy, $config['secret_key'], true);

        $encodedSign = str_replace(['+', '/'], ['-', '_'], base64_encode($sign));

        return "{$config['access_key']}:{$encodedSign}:{$encodedPutPolicy}";
    }
}
