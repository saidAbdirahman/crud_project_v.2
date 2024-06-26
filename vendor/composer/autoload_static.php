<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb395f786f4dc65dd4621ca6dfb30cb09
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Saciid\\CrudProjectV2\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Saciid\\CrudProjectV2\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb395f786f4dc65dd4621ca6dfb30cb09::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb395f786f4dc65dd4621ca6dfb30cb09::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb395f786f4dc65dd4621ca6dfb30cb09::$classMap;

        }, null, ClassLoader::class);
    }
}
