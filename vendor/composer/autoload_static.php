<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a539e1ff9a751b57af0e507dc9bf580
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/league/color-extractor/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit9a539e1ff9a751b57af0e507dc9bf580::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
