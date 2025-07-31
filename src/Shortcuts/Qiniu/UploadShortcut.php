<?php

declare(strict_types=1);

namespace Hongyi\Bucket\Shortcuts\Qiniu;

use Hongyi\Bucket\Plugins\Qiniu\AddPayloadSignaturePlugin;
use Hongyi\Bucket\Plugins\Qiniu\BeginPlugin;
use Hongyi\Bucket\Plugins\Qiniu\UploadPlugin;
use Hongyi\Designer\Contracts\ShortcutInterface;
use Hongyi\Designer\Plugins\AddBodyToPayloadPlugin;
use Hongyi\Designer\Plugins\AddRadarPlugin;
use Hongyi\Designer\Plugins\ParserPlugin;
use Hongyi\Designer\Plugins\StartPlugin;

class UploadShortcut implements ShortcutInterface
{
    public static function getPlugins(): array
    {
        return [
            BeginPlugin::class,
            StartPlugin::class,
            UploadPlugin::class,
            AddPayloadSignaturePlugin::class,
            AddBodyToPayloadPlugin::class,
            AddRadarPlugin::class,
            ParserPlugin::class
        ];
    }
}
