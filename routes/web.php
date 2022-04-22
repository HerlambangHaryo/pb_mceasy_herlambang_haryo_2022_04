<?php

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

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => 'auth'], function () {

     // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');


    Route::resource('Dashboard', DashboardController::class);

        Route::get('Employees/Jawabannodua', 'EmployeesController@Jawabannodua')
                ->name('Employees.Jawabannodua');
    Route::resource('Employees', EmployeesController::class);

        Route::get('Paidleave/Jawabannoempat', 'PaidleaveController@Jawabannoempat')
                ->name('Paidleave.Jawabannoempat');
    Route::resource('Paidleave', PaidleaveController::class);

    Route::resource('Paidleavereasons', PaidleavereasonsController::class);

    Route::resource('Soal', SoalController::class);

    Route::resource('Jobtitle', JobtitleController::class);
});