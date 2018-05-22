<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ReportsController extends Controller
{
    public function show()
    {
        $all= Report::paginate(9);
        return view('pages.reports.index',['all'=>$all]);
    }
}
