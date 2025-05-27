<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $routeName = Route::currentRouteName();
            // debug routeName
            // dd($routeName);

            $routeParams = Route::current()?->parameters() ?? [];
            $map = config('breadcrumbs', []);

            $breadcrumbs = [];

            if ($routeName && isset($map[$routeName])) {
                foreach ($map[$routeName] as $item) {
                    $name = $item['name'];
                    foreach ($routeParams as $key => $value) {
                        $name = str_replace(":$key", $value, $name);
                    }

                    $url = $item['url'];
                    if ($url && Route::has($url)) {
                        $url = route($url, $routeParams);
                    }

                    $breadcrumbs[] = ['name' => $name, 'url' => $url];
                }
            }

            $view->with('breadcrumbs', $breadcrumbs);
        });
    }



    public function register() {}
}
