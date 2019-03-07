<?php

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


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'home', function () {
        return view('admin.index');
    }]);

    Route::resource('/companies', 'CompaniesController');
    Route::resource('/employees', 'EmployeesController');

    Route::get('locale/{locale}', function ($locale) {
        \Session::put('locale', $locale);
        return redirect()->back();
    })->name('locale');
});
