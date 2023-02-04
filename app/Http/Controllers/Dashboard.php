<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->data['controller'] = 'Dashboard';
    }

    public function index()
    {
        $this->data['title']        = "Dashboard";
        return view('dashboard.index', $this->data);
    }
}
