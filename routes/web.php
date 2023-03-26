<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
Route::get('/', function () {
    return view('admin.company.index');
});
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('del/{id}',[CompanyController::class,'delete'])->name('company.del');
    Route::resource('company',CompanyController::class);

    Route::get('delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete');
    Route::resource('employee',EmployeeController::class);
});
