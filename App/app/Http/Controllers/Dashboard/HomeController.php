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
        $breadcrumb = [
            ['name' => 'home', 'route' => route('dashboard.home')],
            ['name' => 'dashboard', 'route' => route('dashboard.home'), 'active' => 'active'],
        ];

        return view(
            'domain.dashboard.home',
            compact(['breadcrumb'])
        );
    }
}
