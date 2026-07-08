<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'serviceCount' => Service::count(),
            'projectCount' => Project::count(),
            'testimonialCount' => Testimonial::count(),
        ]);
    }
}
