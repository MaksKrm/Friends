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
        if (Schema::hasTable('news')) {
            $latestNews = News::orderBy('id', 'desc')->first();
            View::share(['latestNews' => $latestNews]);
        }
        if (Schema::hasTable('images')) {
            $logo = Image::where('animal_id', '=', 99999)->first();
            View::share(['logo' => $logo]);
        }
        if (Schema::hasTable('images')) {
            $companyContacts = Contact::orderBy('id')->take(2)->get();
            View::share(['companyContacts' => $companyContacts]);
        }
        Schema::defaultStringLength(191);
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
