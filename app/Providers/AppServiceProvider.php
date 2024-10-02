<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\GreatMan;
use App\Models\User;
use App\Models\Wishlists;
use App\Models\YoutubeVideo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $menus = Category::whereNull('parent_id')
        ->with('childrenCategories')
        ->get();

        $greatMans = GreatMan::all();

        // $eventCategories = DB::table('event_categories')->select()->get();
        // dd($eventCategories);
        // $banners = Banner::all();
        // $catAndProducts = Category::whereNull('parent_id')->get();
        // view()->share('categories', $categories, 'banners', $banners);
        // view()->share('banners', $banners);
        view()->share('menus', $menus);
        view()->share('greatMans', $greatMans);
        // view()->share('eventCategories',$eventCategories);

        Schema::defaultstringLength(191);

        // view()->composer('*', function ($view) {
        //     $usercartproduct = Cart::where('user_id',session()->get('id'))->get()->toArray();
        //     $view->with('usercartproduct', $usercartproduct);
        // });

        view()->composer('*', function ($view) {
            $banners = Banner::all();
            $view->with('banners', $banners);
        });


        // view()->composer('*', function ($view) {
        //     $videos = YoutubeVideo::all();
            
        //     foreach($videos as $video)
        //     {
        //         $videosIds[] = $video->video_id;
        //     }
            
        //     $view->with('videosIds', $videosIds);
        // });

        


        view()->composer('*', function ($view) {
            $userProfile = User::all()->first();
            $view->with('userProfile', $userProfile);
        });
        
    }
}
