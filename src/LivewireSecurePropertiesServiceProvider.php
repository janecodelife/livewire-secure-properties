<?php

namespace JaneJoe\LivewireSecureProperties;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireSecurePropertiesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $isEnabled = env('LIVEWIRE_SECURE_PROPERTIES_ENABLED', true);
        if ($isEnabled) {
            Livewire::componentHook(PropertySecurityHook::class);
        }
    }

    public function boot(): void {}
}
