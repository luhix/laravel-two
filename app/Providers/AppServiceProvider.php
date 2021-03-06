<?php

namespace App\Providers;

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
        //
       \Carbon\Carbon::setLocale('zh'); //时间的转换
        \App\Models\Topic::observe(\App\Observers\TopicObserver::class);  //注册观察者服务
        \App\Models\Reply::observe(\App\Observers\ReplyObserver::class);  //注册观察者服务
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);

        // Carbon 中文化配置
        \Carbon\Carbon::setLocale('zh');
    }
}
