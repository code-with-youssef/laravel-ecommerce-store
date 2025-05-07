<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLink extends Component
{
    public $route;
    public $label;

    public function __construct($route, $label)
    {
        $this->route = $route;
        $this->label = $label;
    }

    public function isActive()
    {
        return request()->routeIs($this->route);
    }

    public function render()
    {
        return view('components.nav-link');
    }
}
