<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63d5529cddfa15d070e17b3989ca7b6e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\PermissionManagement\\' => 29,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\PermissionManagement\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Modules\\PermissionManagement\\app\\Http\\Controllers\\PermissionManagementController' => __DIR__ . '/../..' . '/app/Http/Controllers/PermissionManagementController.php',
        'Modules\\PermissionManagement\\app\\Http\\Controllers\\Permission\\PermissionController' => __DIR__ . '/../..' . '/app/Http/Controllers/Permission/PermissionController.php',
        'Modules\\PermissionManagement\\app\\Http\\Controllers\\Role\\RoleController' => __DIR__ . '/../..' . '/app/Http/Controllers/Role/RoleController.php',
        'Modules\\PermissionManagement\\app\\Http\\Controllers\\Route\\RouteController' => __DIR__ . '/../..' . '/app/Http/Controllers/Route/RouteController.php',
        'Modules\\PermissionManagement\\app\\Http\\Requests\\Permission\\StorePermissionRequest' => __DIR__ . '/../..' . '/app/Http/Requests/Permission/StorePermissionRequest.php',
        'Modules\\PermissionManagement\\app\\Http\\Requests\\Role\\StoreRoleRequest' => __DIR__ . '/../..' . '/app/Http/Requests/Role/StoreRoleRequest.php',
        'Modules\\PermissionManagement\\app\\Http\\Requests\\Route\\StoreRouteRequest' => __DIR__ . '/../..' . '/app/Http/Requests/Route/StoreRouteRequest.php',
        'Modules\\PermissionManagement\\app\\Models\\Route' => __DIR__ . '/../..' . '/app/Models/Route.php',
        'Modules\\PermissionManagement\\app\\Providers\\PermissionManagementServiceProvider' => __DIR__ . '/../..' . '/app/Providers/PermissionManagementServiceProvider.php',
        'Modules\\PermissionManagement\\app\\Providers\\RouteServiceProvider' => __DIR__ . '/../..' . '/app/Providers/RouteServiceProvider.php',
        'Modules\\PermissionManagement\\app\\Services\\RouteService' => __DIR__ . '/../..' . '/app/Services/RouteService.php',
        'Modules\\PermissionManagement\\database\\seeders\\PermissionManagementDatabaseSeeder' => __DIR__ . '/../..' . '/database/seeders/PermissionManagementDatabaseSeeder.php',
        'Modules\\PermissionManagement\\database\\seeders\\PermissionSeederTableSeeder' => __DIR__ . '/../..' . '/database/seeders/PermissionSeederTableSeeder.php',
        'Modules\\PermissionManagement\\database\\seeders\\RoleSeederTableSeeder' => __DIR__ . '/../..' . '/database/seeders/RoleSeederTableSeeder.php',
        'Modules\\PermissionManagement\\database\\seeders\\RouteSeederTableSeeder' => __DIR__ . '/../..' . '/database/seeders/RouteSeederTableSeeder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit63d5529cddfa15d070e17b3989ca7b6e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63d5529cddfa15d070e17b3989ca7b6e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit63d5529cddfa15d070e17b3989ca7b6e::$classMap;

        }, null, ClassLoader::class);
    }
}
