<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing', [
            'services' => Service::active()->ordered()->get(),
            'projects' => Project::active()->ordered()->get(),
            'testimonials' => Testimonial::active()->ordered()->get(),
            'settings' => Setting::map(),
        ]);
    }
}
