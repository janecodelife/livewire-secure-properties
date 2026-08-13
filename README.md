# Livewire Secure Properties 🔒

An elegant, zero-configuration security package for Laravel Livewire 4 & 3.5 that automatically locks all public component properties from client-side manipulation, unless explicitly marked as unlocked.

## Requirements

- Livewire ^4.0

## Installation

You can install the package via composer:

```bash
composer require janecodelife/livewire-secure-properties
```

## Usage

### 1. Single File Components (SFC)

If you are using Livewire 4's native Single File Components layout, you can safely use the `#[Unlocked]` attribute inside the anonymous class block:

```blade
<?php

use Livewire\Component;
use JaneCodeLife\LivewireSecureProperties\Unlocked;

new class extends Component {
    // ✅ Secured: Locked by default, any client-side update will throw a Security Violation exception
    public string $role = 'admin';

    // 🔓 UNLOCKED: Updatable from client side via wire:model or client-side requests
    #[Unlocked]
    public string $name = 'Jane Joe';
};
?>

<div>
    <input type="text" wire:model.live="name">
    <p>Name: {{ $name }}</p>
    <!-- This would securely block any client-side update attempts -->
    <input type="text" wire:model.live="role">
    <p>Role: {{ $role }}</p>
</div>
```

### 2. Multiple File Components (Class-based)

```php
use Livewire\Component;
use JaneCodeLife\LivewireSecureProperties\Unlocked;

class UserProfile extends Component
{
    // ✅ Secured: Locked by default, any client-side update will throw a Security Violation exception
    public string $role = 'admin';

    // 🔓 UNLOCKED: Updatable from client side via wire:model or client-side requests
    #[Unlocked]
    public string $name = 'Jane Joe';

    public function render()
    {
        return view('livewire.user-profile');
    }
}
```

## Demo Video 📺

<p align="center">
  <img src="assets/livewire_secure_properties.gif" alt="Livewire Secure Properties Video" width="100%">
</p>

## Configuration

If you need to disable the package globally during specific environments (e.g., local debugging), you can add this environment variable to your `.env` file:

```env
LIVEWIRE_SECURE_PROPERTIES_ENABLED=false
```

## Security Violations

When a locked property is violated, the package throws a `PropertyLockedException` with a `403` status code, making it easy to intercept globally or monitor via your error loggers.

## Upcoming 🚀 (Stay Tuned!)

### The Ultimate Neovim Config for Modern Web & Laravel Devs ⚡

I am currently cooking a comprehensive guide and boilerplate configuration on **How to turn Neovim into a (Powerful) IDE** explicitly optimized for:

- **Backend & Frameworks**: PHP (Intelephense) & Full Laravel & Livewire Integration (With Preformance)
- **Frontend & Tooling**: HTML, CSS, JavaScript, TypeScript, and Livewire SFCs
- **Speed**: Blazing fast autocompletion, lightning-speed code navigation, and fuzzy finding.

_Star the repository to get notified immediately when this configuration drops!_

## Support & Sponsorship

If this package secures your app, consider supporting further development through [GitHub Sponsors](https://github.com/sponsors/janecodelife).

## Our Awesome Sponsors 💖

A huge thank you to our sponsors! If you'd like to support this project and feature your logo here, please become a sponsor.

<!-- github-sponsors-start -->
<!-- github-sponsors-end -->
