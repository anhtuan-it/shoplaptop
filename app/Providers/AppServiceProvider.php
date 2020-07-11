<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

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
        // share danh mục sản phẩm vào tất cả trang layout
        $category = DB::table('tbl_category_product')->get();
        view()->share('category',$category);
    }
}
