<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Layouts\HeaderSettings;
use App\Services\Layouts\MenuSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the dashboard home.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //
        // @TODO
        // - [ ] Change getAdminMenu to getMenu($user)
        // - [ ] Change getAdminHeader to getHeader($user)
        //
        $menuSettings = (new MenuSettings())->getAdminMenu();
        $headerSettings = (new HeaderSettings())->getAdminHeader();

        $breadcrumb = [
            ['name' => 'home', 'route' => route('dashboard.home')],
            ['name' => 'dashboard', 'route' => route('dashboard.home'), 'active' => 'active'],
        ];

        return view(
            'domain.dashboard.home',
            compact(['menuSettings', 'headerSettings', 'breadcrumb'])
        );
    }
}
