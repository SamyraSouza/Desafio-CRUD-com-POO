<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb973de42d3dd37d90413fb0780ec02ea
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb973de42d3dd37d90413fb0780ec02ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb973de42d3dd37d90413fb0780ec02ea::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb973de42d3dd37d90413fb0780ec02ea::$classMap;

        }, null, ClassLoader::class);
    }
}
