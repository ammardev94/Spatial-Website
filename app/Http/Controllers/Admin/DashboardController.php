<?php

namespace App\Http\Controllers\Admin;


use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Insight;
use App\Models\MaterialNFinish;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $data = [
            'projects_count' => Project::count(),
            'insights_count' => Insight::count(),
            'materials_count' => MaterialNFinish::count(),
        ];

        return view('admin.index', $data);
    }
}