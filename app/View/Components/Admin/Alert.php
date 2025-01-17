<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;
    public $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $type,
        $message,
        $icon = null
    ) {
        $this->type = $type;
        $this->message = $message;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.alert');
    }
}
