<?php

namespace JaneCodeLife\LivewireSecureProperties\Tests;

use JaneCodeLife\LivewireSecureProperties\LivewireSecurePropertiesServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            LivewireSecurePropertiesServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void {}
}
