<?php

namespace JaneCodeLife\LivewireSecureProperties;

use JaneCodeLife\LivewireSecureProperties\Exceptions\PropertyLockedException;
use Livewire\ComponentHook;
use ReflectionException;
use ReflectionProperty;

class PropertySecurityHook extends ComponentHook
{
    public function update($property, $value, $path)
    {
        $component = $this->component;

        // 🔍 Check if the property has the #[Unlocked] attribute
        if (!$this->propertyIsUnlocked($component, $property)) {
            throw PropertyLockedException::forComponent($component::class, $property);
            return;
        }

        return function () use ($property, $value, $path) {
            logger("✅ Unlocked property [{$property}] updated to: {$value}");
        };
    }

    private function propertyIsUnlocked($component, string $propertyName): bool
    {
        try {
            $reflection = new \ReflectionProperty($component, $propertyName);
            return !empty($reflection->getAttributes(Unlocked::class));
        } catch (\ReflectionException $e) {
            return false;
        }
    }
}
