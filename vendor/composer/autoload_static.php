<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a5728f8164104d9a55290ef12536803
{
    public static $files = array (
        'dbe8fc4910a6b1ab7ce07b2a9b9c5aea' => __DIR__ . '/../..' . '/functions/form.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Myclasses\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Myclasses\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Myclasses',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5a5728f8164104d9a55290ef12536803::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5a5728f8164104d9a55290ef12536803::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
