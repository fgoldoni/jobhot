<?php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings::index');
    }

    public function password()
    {
        return view('settings::password');
    }

    public function billing()
    {
        return view('settings::billing');
    }

    public function invoices()
    {
        return view('settings::invoices');
    }
}
