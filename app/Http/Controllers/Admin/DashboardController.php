<?php

namespace App\Http\Controllers\Admin;


use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConstructionBulletin;
use App\Models\Insight;
use App\Models\Library;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $data = [];

        return view('admin.index', $data);
    }
}
