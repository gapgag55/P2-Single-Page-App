<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb6a6d478fefe3810f7e1667189769d54
{
    public static $files = array (
        '5ec26a44593cffc3089bdca7ce7a56c3' => __DIR__ . '/../..' . '/core/helpers.php',
    );

    public static $classMap = array (
        'App\\Controllers\\ComingMovieController' => __DIR__ . '/../..' . '/app/controllers/ComingMovieController.php',
        'App\\Controllers\\HomeController' => __DIR__ . '/../..' . '/app/controllers/HomeController.php',
        'App\\Controllers\\MovieController' => __DIR__ . '/../..' . '/app/controllers/MovieController.php',
        'App\\Controllers\\NotFoundController' => __DIR__ . '/../..' . '/app/controllers/NotFoundController.php',
        'App\\Controllers\\TopMovieController' => __DIR__ . '/../..' . '/app/controllers/TopMovieController.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'ComposerAutoloaderInitb6a6d478fefe3810f7e1667189769d54' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitb6a6d478fefe3810f7e1667189769d54' => __DIR__ . '/..' . '/composer/autoload_static.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitb6a6d478fefe3810f7e1667189769d54::$classMap;

        }, null, ClassLoader::class);
    }
}
