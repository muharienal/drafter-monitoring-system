<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2a96e0d70d203cf2261d746786880017
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Infrastructure\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Infrastructure\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Modules\\Infrastructure\\app\\Http\\Controllers\\InfrastructureController' => __DIR__ . '/../..' . '/app/Http/Controllers/InfrastructureController.php',
        'Modules\\Infrastructure\\app\\Http\\Requests\\StoreInfrastructureRequest' => __DIR__ . '/../..' . '/app/Http/Requests/StoreInfrastructureRequest.php',
        'Modules\\Infrastructure\\app\\Http\\Requests\\UpdateInfrastructureRequest' => __DIR__ . '/../..' . '/app/Http/Requests/UpdateInfrastructureRequest.php',
        'Modules\\Infrastructure\\app\\Interfaces\\InfrastructureInterface' => __DIR__ . '/../..' . '/app/Interfaces/InfrastructureInterface.php',
        'Modules\\Infrastructure\\app\\Models\\Infrastructure' => __DIR__ . '/../..' . '/app/Models/Infrastructure.php',
        'Modules\\Infrastructure\\app\\Providers\\InfrastructureServiceProvider' => __DIR__ . '/../..' . '/app/Providers/InfrastructureServiceProvider.php',
        'Modules\\Infrastructure\\app\\Providers\\RouteServiceProvider' => __DIR__ . '/../..' . '/app/Providers/RouteServiceProvider.php',
        'Modules\\Infrastructure\\app\\Repositories\\InfrastructureRepository' => __DIR__ . '/../..' . '/app/Repositories/InfrastructureRepository.php',
        'Modules\\Infrastructure\\database\\factories\\InfrastructureFactory' => __DIR__ . '/../..' . '/database/factories/InfrastructureFactory.php',
        'Modules\\Infrastructure\\database\\seeders\\InfrastructureDatabaseSeeder' => __DIR__ . '/../..' . '/database/seeders/InfrastructureDatabaseSeeder.php',
        'Modules\\Infrastructure\\database\\seeders\\Infrastructure\\InfrastructureTableSeeder' => __DIR__ . '/../..' . '/database/seeders/Infrastructure/InfrastructureTableSeeder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2a96e0d70d203cf2261d746786880017::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2a96e0d70d203cf2261d746786880017::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2a96e0d70d203cf2261d746786880017::$classMap;

        }, null, ClassLoader::class);
    }
}