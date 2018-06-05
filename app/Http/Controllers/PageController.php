<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Information;
use App\Models\Animal;
use App\Models\Contact;
use App\Models\Constant;
use App\Models\CloudStorage;
use App\Models\Report;

class PageController extends Controller
{
    public function getIndexPage()
    {
        $news = News::orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('index', ['news' => $news]);
    }

    public function getHelp()
    {
        $all = Constant::all();
        return view('pages.help.index', ['all' => $all]);
    }

    public function getContacts()
    {
        $contacts = Contact::all();
        return view('pages.contacts.index', compact('contacts', $contacts));
    }

    public function getAllReports(Request $request)
    {
        $reports= CloudStorage::paginate(5);
        if ($request->ajax()) {
            return view('pages.reports.load', ['reports' => $reports])->render();
        }
        $now=date('Y-m');
        $all=Report::where('accounting_period','like','%'.$now.'%')->get();
        return view('pages.reports.index',['all'=>$all,'reports'=>$reports]);
    }
}
