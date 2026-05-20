<?php

namespace JaneJoe\LivewireSecureProperties\Tests;

use JaneJoe\LivewireSecureProperties\Exceptions\PropertyLockedException;
use JaneJoe\LivewireSecureProperties\Unlocked;
use Livewire\Component;
use Livewire\Livewire;

class PropertySecurityTest extends TestCase
{
    /**
     * @test
     */
    public function it_blocks_client_side_updates_on_locked_properties_by_default()
    {
        // محاكاة محاولة تعديل الخاصية المقفلة من طرف العميل
        $this->expectException(PropertyLockedException::class);

        Livewire::test(TestComponent::class)
            ->set('secretData', 'hacked_value');
    }

    /**
     * @test
     */
    public function it_allows_client_side_updates_on_properties_marked_with_unlocked_attribute()
    {
        // التأكد من أن الخاصية المفتوحة تقبل التحديث دون أي استثناءات
        Livewire::test(TestComponent::class)
            ->set('publicData', 'new_allowed_value')
            ->assertSet('publicData', 'new_allowed_value');
    }
}

/**
 * مكون Livewire وهمي مخصص لأغراض الفحص والاختبار فقط
 */
class TestComponent extends Component
{
    // خاصية محمية ومقفلة تلقائياً
    public string $secretData = 'original_secret';

    // خاصية مسموح بتعديلها من العميل باستخدام الـ Attribute الخاص بنا
    #[Unlocked]
    public string $publicData = 'original_public';

    public function render()
    {
        return '<div></div>';
    }
}
