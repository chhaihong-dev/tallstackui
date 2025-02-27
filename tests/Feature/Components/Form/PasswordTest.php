<?php

it('can render', function () {
    $component = <<<'HTML'
    <x-password />
    HTML;

    $this->blade($component)
        ->assertSee('<input', false);
});

it('can render with label', function () {
    $component = <<<'HTML'
    <x-password label="Foo bar" />
    HTML;

    $this->blade($component)
        ->assertSee('<input', false)
        ->assertSee('Foo bar');
});

it('can render with label and hint', function () {
    $component = <<<'HTML'
    <x-password label="Foo bar" hint="Bar baz" />
    HTML;

    $this->blade($component)
        ->assertSee('<input', false)
        ->assertSee('Bar baz')
        ->assertSee('Foo bar');
});
