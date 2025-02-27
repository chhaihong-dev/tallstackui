<?php

namespace TallStackUi\View\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use TallStackUi\View\Personalizations\Contracts\Personalization;
use TallStackUi\View\Personalizations\SoftPersonalization;
use TallStackUi\View\Personalizations\Traits\InteractWithProviders;

#[SoftPersonalization('button.circle')]
class Circle extends Component implements Personalization
{
    use InteractWithProviders;

    public function __construct(
        public ?string $text = null,
        public ?string $icon = null,
        public ?string $color = 'primary',
        public ?string $href = null,
        public ?string $loading = null,
        public ?string $delay = null,
        public ?string $sm = null,
        public ?string $md = null,
        public ?string $lg = null,
        public ?string $size = null,
        public ?bool $solid = null,
        public ?bool $outline = null,
        public ?bool $light = false,
        public ?string $style = null,
    ) {
        $this->style = $this->outline ? 'outline' : ($this->light ? 'light' : 'solid');
        $this->size = $this->lg ? 'lg' : ($this->sm ? 'sm' : 'md');

        $this->colors();
    }

    public function personalization(): array
    {
        return Arr::dot([
            'wrapper' => [
                'base' => 'focus:ring-offset-white focus:shadow-outline group inline-flex items-center justify-center rounded-full gap-x-2 border text-sm outline-none transition-all duration-200 ease-in-out hover:shadow-sm focus:border-transparent focus:ring-2 disabled:cursor-not-allowed disabled:opacity-50',
                'sizes' => [
                    'sm' => 'w-6 h-6',
                    'md' => 'w-9 h-9',
                    'lg' => 'w-12 h-12',
                ],
            ],
            'icon.sizes' => [
                'sm' => 'w-3 h-3',
                'md' => 'w-4 h-4',
                'lg' => 'w-6 h-6',
            ],
            'text.sizes' => [
                'sm' => 'text-xs',
                'md' => 'text-md',
                'lg' => 'text-xl',
            ],
        ]);
    }

    public function render(): View
    {
        return view('tallstack-ui::components.button.circle');
    }
}
