<?php

namespace LaravelFrontendPresets\InertiaJsPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class InertiaJsPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('inertiajs', function ($command) {
            $options = $command->option('option');

            InertiaJsPreset::install($options);

            $command->info('Inertia.js scaffolding installed successfully.');
            $command->info('Please run "npm install && npm run dev" to compile your fresh scaffolding.');

            if (in_array('auth', $options)) {
                $command->info('You need to install the following composer packages:');
                $command->info("\tcomposer require tightenco/ziggy");
                $command->info('Also, remember to register the new App\Providers\InertiaServiceProvider in your config/app.php list.');
            }
        });
    }
}
