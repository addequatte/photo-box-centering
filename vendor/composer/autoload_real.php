<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitad72e4ee3b6f14ba84e5342d815a954d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitad72e4ee3b6f14ba84e5342d815a954d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitad72e4ee3b6f14ba84e5342d815a954d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitad72e4ee3b6f14ba84e5342d815a954d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}