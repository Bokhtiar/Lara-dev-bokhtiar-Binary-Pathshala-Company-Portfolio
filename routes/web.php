<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\webSettingController;
use App\Models\About;
use App\Models\Portfolio;
use App\Models\Price;
use App\Models\Question;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $about = About::query()->Active()->first();
    $services = Service::query()->Active()->get();
    $portfolios = Portfolio::query()->Active()->get();
    $prices = Price::query()->Active()->get();
    $questions = Question::all();
    $teams = Team::all();
    return view('user.index', compact('about', 'services','portfolios','prices','questions','teams'));
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('portfolio/detail/{id}', [App\Http\Controllers\User\PortfolioController::class, 'show'])->name('portfolio.detail');

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
    /*web setting */
    Route::resource('web-setting', webSettingController::class);
    /*price */
    Route::resource('price', PriceController::class);
    Route::get('price/status/{id}', [PriceController::class, 'status'])->name('price.status');
    /*question */
    Route::resource('question', QuestionController::class);
    Route::get('question/status/{id}', [QuestionController::class, 'status'])->name(']question.status');

});
