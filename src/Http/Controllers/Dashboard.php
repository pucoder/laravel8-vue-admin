<?php

namespace Encore\Admin\Http\Controllers;

use Encore\Admin\Admin;
use Illuminate\Support\Arr;

class Dashboard
{
    /**
     * @return array
     */
    public static function title()
    {
        return [
            'view' => 'Dashboard/Title'
        ];
    }

    /**
     * @return array
     */
    public static function environment()
    {
        return [
            'view' => 'Dashboard/Environment',
            'data' => [
                'envs' => [
                    ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
                    ['name' => 'Laravel version',   'value' => app()->version()],
                    ['name' => 'CGI',               'value' => php_sapi_name()],
                    ['name' => 'Uname',             'value' => php_uname()],
                    ['name' => 'Server',            'value' => Arr::get($_SERVER, 'SERVER_SOFTWARE')],

                    ['name' => 'Cache driver',      'value' => config('cache.default')],
                    ['name' => 'Session driver',    'value' => config('session.driver')],
                    ['name' => 'Queue driver',      'value' => config('queue.default')],

                    ['name' => 'Timezone',          'value' => config('app.timezone')],
                    ['name' => 'Locale',            'value' => config('app.locale')],
                    ['name' => 'Env',               'value' => config('app.env')],
                    ['name' => 'URL',               'value' => config('app.url')],
                ]
            ]
        ];
    }

    /**
     * @return array
     */
    public static function extensions()
    {
        $extensions = [
            'helpers' => [
                'name' => 'laravel-admin-ext/helpers',
                'link' => 'https://github.com/laravel-admin-extensions/helpers',
                'icon' => 'fas fa-cogs',
            ],
            'log-viewer' => [
                'name' => 'laravel-admin-ext/log-viewer',
                'link' => 'https://github.com/laravel-admin-extensions/log-viewer',
                'icon' => 'fas fa-database',
            ],
            'backup' => [
                'name' => 'laravel-admin-ext/backup',
                'link' => 'https://github.com/laravel-admin-extensions/backup',
                'icon' => 'fas fa-copy',
            ],
            'config' => [
                'name' => 'laravel-admin-ext/config',
                'link' => 'https://github.com/laravel-admin-extensions/config',
                'icon' => 'fas fa-toggle-on',
            ],
            'api-tester' => [
                'name' => 'laravel-admin-ext/api-tester',
                'link' => 'https://github.com/laravel-admin-extensions/api-tester',
                'icon' => 'fas fa-mouse',
            ],
            'media-manager' => [
                'name' => 'laravel-admin-ext/media-manager',
                'link' => 'https://github.com/laravel-admin-extensions/media-manager',
                'icon' => 'fas fa-file',
            ],
            'scheduling' => [
                'name' => 'laravel-admin-ext/scheduling',
                'link' => 'https://github.com/laravel-admin-extensions/scheduling',
                'icon' => 'fas fa-calendar-alt',
            ],
            'reporter' => [
                'name' => 'laravel-admin-ext/reporter',
                'link' => 'https://github.com/laravel-admin-extensions/reporter',
                'icon' => 'fas fa-bug',
            ],
            'redis-manager' => [
                'name' => 'laravel-admin-ext/redis-manager',
                'link' => 'https://github.com/laravel-admin-extensions/redis-manager',
                'icon' => 'fas fa-flask',
            ],
        ];

        foreach ($extensions as &$extension) {
            $name = explode('/', $extension['name']);
            $extension['installed'] = array_key_exists(end($name), Admin::$extensions);
        }

        return [
            'view' => 'Dashboard/Extensions',
            'data' => [
                'extensions' => $extensions
            ]
        ];
    }

    /**
     * @return array
     */
    public static function dependencies()
    {
        $json = file_get_contents(base_path('composer.json'));

        $dependencies = json_decode($json, true)['require'];

        return [
            'view' => 'Dashboard/Dependencies',
            'data' => [
                'dependencies' => $dependencies
            ]
        ];
    }
}
