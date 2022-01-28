<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardLayout extends Component
{
    public $menuSettings;
    public $headerSettings;
    public $breadcrumb;

    public function __construct($menuSettings, $headerSettings, $breadcrumb)
    {
        $this->menuSettings = $menuSettings;
        $this->headerSettings = $headerSettings;
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('domain.dashboard.base');
    }
}
