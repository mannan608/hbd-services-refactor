<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

class SearchableSelect extends Component
{
    public function __construct(
        public string $name,
        public array $options = [],
        public string $label = '',
        public string $value = '',
        public string $placeholder = 'Select Option',
    ) {}

    public function render(): View
    {
        return view('components.form.searchable-select');
    }
}