# Livewire Secure Properties 🔒

[![Follow on X](https://img.shields.io/badge/Follow-@janecodelife-000000?style=for-the-badge&logo=x)](https://x.com/janecodelife)
[![Subscribe on YouTube](https://img.shields.io/badge/Subscribe-@JaneCodeLife-FF0000?style=for-the-badge&logo=youtube)](https://www.youtube.com/@JaneCodeLife)

An elegant, zero-configuration security package for Laravel Livewire 4 that automatically locks all public component properties from client-side manipulation, unless explicitly marked as unlocked.

✅ Auto-lock properties

✅ Zero configuration

✅ Protects against client-side tampering

✅ Unlock specific properties with #[Unlocked]

✅ Supports Livewire 4 (Single & Multiple File)

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

```php
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

---

## 💝 Support the Project

> *This plugin is built entirely on developer insights gathered over **years of building real-world software** to catch common pain points, combined with **months of dedicated building and rigorous testing** to ensure it operates flawlessly.*

If this utility boosts your everyday speed and eliminates annoying file search clutter, please consider buying me a coffee or supporting my continuous maintenance!

You can tip or donate directly to my **TRON (TRX / USDT-TRC20)** crypto wallet address:
### ☕☕☕☕ Support me by coffee via USDT ☕☕☕☕

- **Network:** `TRX Tron (TRC20)`
- **Address:** `TAFFjBP39Z86weL5dDU1A2251VrgPprDUj`

> *Every bit of support fuels the expansion of this ecosystem and helps me write cleaner tools for all of us. Thank you for standing behind independent developers!* 🙏

---

## 🔗 My Other Plugins

Check out my other open-source tools to supercharge your Neovim environment:
- **[livewire-secure-properties](https://github.com/janecodelife/livewire-secure-properties)** - Secure livewire app properties by default and void headache.
- **[todo-tracker.nvim](https://github.com/janecodelife/todo-tracker.nvim)** - Assign and list app todos in a blink
- **[folders-bookmark.nvim](https://github.com/janecodelife/folders-bookmark.nvim)** - Bookmark folders and accessing them by keymap in a blink

---

## 🤝 Let's Build Together (Contact Me)

I will be there i am answer to all messages

- **X (Twitter)**: [https://x.com/janecodelife](https://x.com/janecodelife)
- **YouTube**: [https://www.youtube.com/@JaneCodeLife](https://www.youtube.com/@JaneCodeLife) 

---

A huge thank you to our sponsors! 

<!-- SPONSORS -->
<!-- SPONSORS -->

---

## Upcoming 🚀 (Stay Tuned!)

### The Ultimate Neovim Config for Modern Web & Laravel Devs ⚡

I am currently cooking a comprehensive guide and boilerplate configuration on **How to turn Neovim into a (Powerful) IDE** explicitly optimized for:

- **Backend & Frameworks**: PHP (Intelephense) & Full Laravel & Livewire Integration (With Preformance)
- **Frontend & Tooling**: HTML, CSS, JavaScript, TypeScript, and Livewire SFCs
- **Speed**: Blazing fast autocompletion, lightning-speed code navigation, and fuzzy finding.
