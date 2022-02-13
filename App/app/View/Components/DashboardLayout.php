<?php

namespace App\View\Components;

use App\Services\Layouts\{HeaderSettings, MenuSettings};
use Illuminate\Http\Request;
use Illuminate\View\Component;

class DashboardLayout extends Component
{
    public $menuSettings;
    public $headerSettings;
    public $breadcrumb;

    public function __construct(Request $request, $breadcrumb)
    {
        $this->menuSettings = (new MenuSettings())->getUserMenu($request->user());
        $this->headerSettings = (new HeaderSettings())->getUserHeader($request->user());

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
