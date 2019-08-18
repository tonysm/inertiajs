<?php

namespace LaravelFrontendPresets\InertiaJsPreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Arr;

class InertiaJsPreset extends Preset
{
    public static function install(array $options = [])
    {
        static::updatePackages();
        static::updateBootstrapping();
        static::updateWelcomePage();
        static::updateGitignore();
        static::scaffoldComponents();
        static::scaffoldRoutes();
        static::removeNodeModules();

        if (in_array('auth', $options)) {
            static::scaffoldAuth();
        }
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
            '@babel/plugin-syntax-dynamic-import' => '^7.2.0',
            '@inertiajs/inertia' => '^0.1.0',
            '@inertiajs/inertia-vue' => '^0.1.0',
            'vue-template-compiler' => '^2.6.10',
            'jquery' => '^3.2',
            'bootstrap' => '^4.2.0',
        ], $packages);
    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/inertiajs-stubs/webpack.mix.js', base_path('webpack.mix.js'));

        copy(__DIR__.'/inertiajs-stubs/resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/inertiajs-stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));

        copy(__DIR__.'/inertiajs-stubs/resources/sass/app.scss', resource_path('sass/app.scss'));
        copy(__DIR__.'/inertiajs-stubs/resources/sass/_nprogress.scss', resource_path('sass/_nprogress.scss'));
    }

    protected static function updateWelcomePage()
    {
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));

        copy(__DIR__.'/inertiajs-stubs/resources/views/app.blade.php', resource_path('views/app.blade.php'));
    }

    protected static function updateGitignore()
    {
        file_put_contents(
            base_path('.gitignore'),
            file_get_contents(__DIR__.'/inertiajs-stubs/gitignore'),
            FILE_APPEND
        );
    }

    protected static function scaffoldComponents()
    {
        tap(new Filesystem, function (Filesystem $fs) {
            $fs->deleteDirectory(resource_path('js/components'));

            $fs->copyDirectory(__DIR__.'/inertiajs-stubs/resources/js/Shared', resource_path('js/Shared'));

            $fs->copyDirectory(__DIR__.'/inertiajs-stubs/resources/js/Pages', resource_path('js/Pages'));
        });
    }

    protected static function scaffoldRoutes()
    {
        copy(__DIR__.'/inertiajs-stubs/routes/web.php', base_path('routes/web.php'));
    }

    protected static function scaffoldAuth()
    {
        tap(new Filesystem, function (Filesystem $fs) {
            $fs->append(base_path('routes/web.php'), $fs->get(__DIR__.'/inertiajs-auth-stubs/routes/web.stub'));

            $fs->copyDirectory(__DIR__.'/inertiajs-auth-stubs/resources/js', resource_path('js'));

            $fs->copyDirectory(__DIR__.'/inertiajs-auth-stubs/controllers', app_path('Http/Controllers'));

            $fs->copy(__DIR__.'/inertiajs-auth-stubs/providers/InertiaServiceProvider.stub', app_path('Providers/InertiaServiceProvider.php'));

            $fs->copy(__DIR__.'/inertiajs-auth-stubs/resources/views/app.blade.php', resource_path('views/app.blade.php'));
        });
    }
}
