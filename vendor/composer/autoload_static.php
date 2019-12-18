<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf6fc854a58d5faef971dde531c3a7c0f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf6fc854a58d5faef971dde531c3a7c0f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf6fc854a58d5faef971dde531c3a7c0f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}