<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('user.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["as"=>'user.', "prefix"=>'user',  "middleware"=>['auth','user']],function(){
    Route::get('dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('dashboard');
});

Route::group(["as"=>'admin.', "prefix"=>'admin', "middleware"=>['auth','admin']],function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');

    /*service */
    Route::resource('service', ServiceController::class);
    Route::get('service/status/{service_id}', [ServiceController::class, 'status'])->name('service.status');
    /*about*/
    Route::resource('about', AboutController::class);
    Route::get('about/status/{about_id}', [AboutController::class, 'status'])->name('about.status');
    /*portfolio */
    Route::resource('portfolio', PortfolioController::class);
    Route::get('portfolio/status/{portfolio_id}', [PortfolioController::class, 'status'])->name('portfolio.status');
    /*team */
     Route::resource('team', TeamController::class);
     Route::get('team/status/{team_id}', [TeamController::class, 'status'])->name('team.status');
    /*blog */
     Route::resource('blog', BlogController::class);
     Route::get('blog/status/{team_id}', [BlogController::class, 'status'])->name('blog.status');
});
