<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $leftIcon;
    public $righttIcon;


    /**
     * Create a new component instance.
     */
    public function __construct($type, $leftIcon = '', $righttIcon = '')
    {
        /**
         * Definisi mana aja yang merupakan valid type dari button yang diambil dari flowbite
         */
        $validTypes = ['default', 'alternative', 'dark', 'light', 'success', 'warning', 'info', 'danger'];

        $this->leftIcon = $leftIcon;
        $this->righttIcon = $righttIcon;

        $this->type = in_array($type, $validTypes) ? $type : 'default';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}