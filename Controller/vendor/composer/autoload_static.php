<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9f667c8242de60aff2ffb6d5c2a39751
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9f667c8242de60aff2ffb6d5c2a39751::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9f667c8242de60aff2ffb6d5c2a39751::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9f667c8242de60aff2ffb6d5c2a39751::$classMap;

        }, null, ClassLoader::class);
    }
}
