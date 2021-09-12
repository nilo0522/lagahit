<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\BikeDetailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('about-us', function () {
    return view('about-us');
});

Route::get('contact', function () {
    return view('contact');
});




// Route::get('upload-car', function () {
//     return view('uploadcar');
// });

// Route::get('car-listing', function () {
//     return view('car-listing');
// });


// Route::post('post-to-server',[FileController::class, 'index']);



Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin.dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('upload-bike',[BikeDetailController::class,'create']);
Route::get('bike-listing',[BikeDetailController::class,'index']);
Route::get('bikedetail/{bike_details}',[BikeDetailController::class,'show']);
Route::get('myposts/{bike_details}',[BikeDetailController::class,'userpost']);
Route::get('editbike/{BikeDetail}',[BikeDetailController::class,'edit']);
Route::get('deletebike/{bike_details}',[BikeDetailController::class,'destroy']);
Route::get('updatebike/{bike_details}',[BikeDetailController::class,'update']);
/*
Route::get('withdriver',[BikeDetailController::class,'withdriver']);
Route::get('withoutdriver',[BikeDetailController::class,'withoutdriver']);
*/
Route::get('allcars',[BikeDetailController::class,'allcars']);

Route::get('reg-users',[RegisterController::class,'usersdata']);

// Route::post('store-car-detail',[BikeDetailController::class,'store']);


Route::get('dashboard', function () {
    return view('admin/dashboard');
});
Route::resource('bike_details',BikeDetailController::class);


