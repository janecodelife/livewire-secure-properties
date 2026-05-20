# Livewire Secure Properties 🔒

An elegant, zero-configuration security package for Laravel Livewire 4 & 3.5 that automatically locks all public component properties from client-side manipulation, unless explicitly marked as unlocked.

## Requirements

- PHP ^8.2
- Laravel ^11.0 | ^12.0 | ^13.0
- Livewire ^3.5 | ^4.0

## Installation

You can install the package via composer:

```bash
composer require jane-joe/livewire-secure-properties
```

## How It Works

By default, this package automatically intercepts all client-side updates (like `wire:model` or JS modifications). If a user attempts to modify a property from the client side without authorization, a `PropertyLockedException` (403 Forbidden) is thrown immediately.

## Usage

### 1. Standard Livewire Components

To allow a property to be updated from the frontend in a standard component, simply add the `#[Unlocked]` attribute above it:

```php
use Livewire\Component;
use JaneJoe\LivewireSecureProperties\Unlocked;

class UserProfile extends Component
{
    // ❌ LOCKED: Any client-side update will throw a Security Violation exception
    public string $role = 'admin';

    // ✅ UNLOCKED: Safe to update via wire:model or client-side requests
    #[Unlocked]
    public string $name = 'Jane Joe';

    public function render()
    {
        return view('livewire.user-profile');
    }
}
```

### 2. Single File Components (SFC)

If you are using Livewire 4's native Single File Components layout, you can safely use the `#[Unlocked]` attribute inside the anonymous class block:

```blade
<?php

use Livewire\Component;
use JaneJoe\LivewireSecureProperties\Unlocked;

new class extends Component
{
    // ❌ LOCKED: Any client-side update will throw a Security Violation exception
    public string $role = 'admin';

    // ✅ UNLOCKED: Safe to update via wire:model or client-side requests
    #[Unlocked]
    public string $name = 'Jane Joe';
};
?>

<div>
    <!-- Bound via wire:model safely -->
    <input type="text" wire:model="name">

    <!-- This would securely block any client-side update attempts -->
    <p>Role: {{ $role }}</p>
</div>
```

## Configuration

If you need to disable the package globally during specific environments (e.g., local debugging), you can add this environment variable to your `.env` file:

```env
LIVEWIRE_SECURE_PROPERTIES_ENABLED=false
```

## Security Violations

When a locked property is violated, the package throws a `PropertyLockedException` with a `403` status code, making it easy to intercept globally or monitor via your error loggers.

## Support & Sponsorship

If this package secures your app, consider supporting further development through [GitHub Sponsors](https://github.com).
