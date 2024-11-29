<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad72e4ee3b6f14ba84e5342d815a954d
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tests\\' => 6,
        ),
        'A' => 
        array (
            'Addequatte\\PhotoBoxCentraze\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'Addequatte\\PhotoBoxCentraze\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitad72e4ee3b6f14ba84e5342d815a954d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad72e4ee3b6f14ba84e5342d815a954d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad72e4ee3b6f14ba84e5342d815a954d::$classMap;

        }, null, ClassLoader::class);
    }
}
