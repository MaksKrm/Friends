<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Information;
use App\Models\Animal;
use App\Models\Contact;
use App\Models\Constant;

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

    public function getAllReports()
    {
        return view('pages.reports.index');
    }
}
