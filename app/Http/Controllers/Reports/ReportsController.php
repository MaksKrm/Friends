<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function choose(Request $request)
    {
        $choose_date=$request->year.'-'.'0'.$request->month;
        $date=Report::where('accounting_period','like','%'.$choose_date.'%')->get();
        return view('pages.reports.choose',['date'=>$date]);
    }
}
