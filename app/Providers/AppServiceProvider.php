<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\News;
use App\Models\Image;
use App\Models\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $latestNews = News::orderBy('id', 'desc')->first();
        $logo = Image::where('animal_id', '=', 99999)->first();
        $contact = Contact::where('id', '=', 99999)->first();
        View::share(['latestNews' => $latestNews, 'logo' => $logo, 'contact' => $contact]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
