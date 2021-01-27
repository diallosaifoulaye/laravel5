<?php
use Illuminate\Http\Request;

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


//Route::get('/','WelcomeController@index');

//Route::get('/', ['uses' => 'WelcomeController@index', 'as' => 'home']); Route nommée

Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');

Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');

Route::get('article/{n}', function($n) {
    return view('test')->withNumero($n);
})->where('n', '[1-3]');;

Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);

Route::get('photo', 'PhotoController@getForm');
Route::post('photo', 'PhotoController@postForm');

Route::resource('user', 'UserController')->middleware('auth');

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//SESSION
Route::get('/home', function () {
    session(['key' => 'Hello World']);
    session(['key1' => 'Am Diallo']);
    $value = session('key');
    return response($value, 200)
        ->header('Content-Type', 'text/plain');
});
Route::get('/homes', function (Request $request) {
    $data = $request->session('key1')->all();

    //$data = $request->session()->get('key1');

    return response($data/*, 200)
        ->header('Content-Type', 'text/plain'*/);
});

//telecharge un fichier
Route::get('/download', function () {
    return response()->download('/Applications/MAMP/htdocs/laravel/public/uploads/pHiGM6i37k.png', 'test');
});

//afficher le fichier dans le navigateur
Route::get('/downloadd', function () {
    return response()->file('/Applications/MAMP/htdocs/laravel/public/uploads/pHiGM6i37k.png');
});

//affiche l'url actuel
Route::get('/test', function () {
    return url()->current();;
});
//Get the current URL including the query string...
Route::get('/test1', function () {
    return url()->full();;
});
// Get the full URL for the previous request...
Route::get('/test2', function () {
    return url()->previous();;
});



