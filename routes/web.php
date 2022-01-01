<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardControllder;

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
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [HomeController::class,'home'])->name('home');
    Route::get('/properties', [PropertyController::class,'index'])->name('properties');
    Route::get('/property/{id}', [PropertyController::class,'singleProperty'])->name('singleProperty');
    Route::get('/page/{slug}', [PageController::class,'single'])->name('page');
    Route::post('/property-inquiry/{id}', [ContactController::class,'propertyInquiry'])->name('property-inquiry');
});


// admin routes
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardControllder::class,'index'])->name('dashboard');
    Route::get('/dashboard/properties', [DashboardControllder::class,'properties'])->name('dashboard-properties');
    Route::get('/dashboard/add-property', [DashboardControllder::class,'addProperty'])->name('add-property');
    Route::post('/dashboard/add-property', [DashboardControllder::class,'createProperty'])->name('dashboard-property.store');
    Route::get('/dashboard/edit-property/{id}', [DashboardControllder::class,'editProperty'])->name('edit-property');
});



require __DIR__.'/auth.php';
