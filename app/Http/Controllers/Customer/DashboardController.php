<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Customer/Dashboard', [
            'title' => 'dashboard',
            'subtitle' => '',
            'active' => 'dashboard'
        ]);
    }
}
