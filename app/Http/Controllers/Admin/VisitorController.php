<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitorData;
use Session, Redirect;
use Carbon\Carbon;

class VisitorController extends Controller
{
    protected $communicationService;

    public function index()
    {
        $totalVisitors = VisitorData::count();
        $last24Hours = VisitorData::where('latest_visit_time', '>=', Carbon::now()->subDay())->count();
        $last1Hour = VisitorData::where('latest_visit_time', '>=', Carbon::now()->subHour())->count();

        // For chart: group visitors by day
        $visitorsChart = VisitorData::selectRaw('DATE(visit_time) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $visitors = VisitorData::latest()->paginate(20);

        $view = 'Admin.VisitorData.Index';
        return view('Admin', compact(
            'view',
            'totalVisitors',
            'last24Hours',
            'last1Hour',
            'visitorsChart',
            'visitors'
        )); 
    }
}
