<?php

use App\Http\Livewire\Biodata;
use App\Landing;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function(){
    Route::get('home', 'HomeController@index')->name('home');

    // Resources
    Route::resource('profile', 'ProfileController');
    Route::resource('landing', 'LandingPageController');
    Route::resource('links', 'LinksController');
    Route::resource('generate', 'PostController');
    //

    Route::get('/dashboard', 'LandingPageController@showDashboardLanding')->name('dashboard-landing');
    Route::get('/biodata', 'LandingPageController@biodata')->name('biodata');
    Route::put('/storeBiodata', 'LandingPageController@storeBiodata')->name('storeBiodata');
    // Route::put('/updateLinks/{id}', 'LandingPageController@updateLinks')->name('updateLinks');
    Route::post('/storeLinks/{id}', 'LinksController@storeLinks')->name('storeLinks');
    Route::get('/generate/{prefix}/{id}/edit' ,'PostController@edit')->name('edit-posts');
});

Route::get('/', function () {

    if (Auth::check()){
        $posts = Post::where(['user_id' => Auth::user()->id, 'type' => 'landing'])->get()->count();

        return view('welcome', [
            'posts' => $posts
        ]);
    }else {
        return view('welcome');
    }
});

Auth::routes();

// Logout Route
Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('login');

});
// End of Logout Route

// get data
Route::get('/getPrefix', 'PostController@getPrefix');
Route::get('/data', 'PostController@data');
// End of get data


// Landing Page Route
Route::get('/landings/{id}', 'LandingPageController@create');
Route::get('/getPrefixLanding', 'LandingPageController@getPrefix');
Route::get('/showLink', 'LinksController@showLink')->name('show-link');
// End of Landing Page Route


// get prefix
Route::get('/{prefix}', 'PostController@shortenLink')->name('shorten.link');
