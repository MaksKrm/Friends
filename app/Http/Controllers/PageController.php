<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Information;
use App\Models\Animal;
use App\Models\Contact;

class PageController extends Controller
{
    public function getAllNews() {
        $news = News::orderBy('id', 'desc')->paginate(8);
        return view('pages.news.index', ['news' => $news]);
    }

    public function getAllInformation() {
        $information = Information::orderBy('id', 'desc')->paginate(8);
        return view('pages.information.index', ['information' => $information]);
    }

    public function getHelp() {
        return view('pages.help.index');
    }

    public function getAllAnimals() {
        $animals = Animal::where('published', 1)->orderBy('id', 'desc')->paginate(10);
        return view('pages.animal.index', ['animals' => $animals]);
    }

    public function getContacts() {
        $contacts = Contact::all();
        return view('pages.contacts.index', compact('contacts', $contacts));
    }

    public function getAllReports() {
        return view('pages.reports.index');
    }
}
