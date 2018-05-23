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

    public function getAllNews()
    {
        $news = News::orderBy('id', 'desc')->paginate(8);
        return view('pages.news.index', ['news' => $news]);
    }

    public function getNewsArticle($id)
    {
        $article = News::find($id);
        return view('pages.news.show', ['article' => $article]);
    }

    public function getAllInformation()
    {
        $information = Information::orderBy('id', 'desc')->paginate(8);
        return view('pages.information.index', ['information' => $information]);
    }

    public function getInformArticle($id)
    {
        $article = Information::find($id);
        return view('pages.information.show', ['article' => $article]);
    }


    public function getHelp()
    {
        $all = Constant::all();
        return view('pages.help.index', ['all' => $all]);
    }

    public function getAllAnimals()
    {
        $animals = Animal::where('published', 1)->orderBy('id', 'desc')->paginate(10);
        return view('pages.animal.index', ['animals' => $animals]);
    }

    public function getContacts()
    {
        $contacts = Contact::all();
        return view('pages.contacts.index', compact('contacts', $contacts));
    }

    public function getAnimal($id)
    {
        $animal = Animal::find($id);
        return view('pages.animal.show', ['animal' => $animal]);
    }

    public function getAllReports()
    {
        return view('pages.reports.index');
    }
}
