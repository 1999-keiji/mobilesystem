<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Shop;
use App\Models\Pay;
use App\Models\Category;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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
        //
      view()->composer('*', function ($view){
        $current_user = \Auth::user();
        $user = User::all()->where('shop_id', $current_user['shop_id']);
        $shops = Shop::all()->unique('name');
        $pay = Pay::all();
        $categories = Category::all();
        $today = Carbon::today()->format('Y-m-d');
        $view->with('shops', $shops)->with('current_user',$current_user)->with('user',$user)->with('today',$today)->with('pay',$pay)->with('categories',$categories);
      });
    }
}
