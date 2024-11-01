<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $class;
    /**
     * Create a new component instance.
     */
    public function __construct($type = 'info')
    {
        switch ($type) {
            case 'info':
                $class = "text-blue-800 bg-blue-50";
                break;
            case 'alert':
                $class = "text-red-800 bg-red-50";
                break;            
            default:
                $class = "text-blue-800 bg-blue-50";
                break;
        }

        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
