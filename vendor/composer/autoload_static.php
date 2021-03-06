<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit50dc8262c5d20937c5d670291e4cac42
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
            'Tools\\' => 6,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
        'A' => 
        array (
            'APP\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Tools\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'APP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit50dc8262c5d20937c5d670291e4cac42::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit50dc8262c5d20937c5d670291e4cac42::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit50dc8262c5d20937c5d670291e4cac42::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit50dc8262c5d20937c5d670291e4cac42::$classMap;

        }, null, ClassLoader::class);
    }
}
