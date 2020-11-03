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

Route::delete('admin/person/{person_id}/contact/{id}', 'App\Http\Controllers\Admin\ContactController@destroy')->name('contact.destroy');
Route::get('admin/person/{person_id}/contact/{id}/edit', 'App\Http\Controllers\Admin\ContactController@edit')->name('contact.edit');
Route::put('admin/person/{person_id}/contact/{id}', 'App\Http\Controllers\Admin\ContactController@update')->name('contact.update');
Route::get('admin/person/{person_id}/contact/create', 'App\Http\Controllers\Admin\ContactController@create')->name('contact.create');
Route::post('admin/person/{person_id}/contact', 'App\Http\Controllers\Admin\ContactController@store')->name('contact.store');
Route::get('admin/person/{person_id}/contact', 'App\Http\Controllers\Admin\ContactController@index')->name('contact.index');


Route::delete('admin/person/{id}', 'App\Http\Controllers\Admin\PersonController@destroy')->name('person.destroy');
Route::get('admin/person/{id}/edit', 'App\Http\Controllers\Admin\PersonController@edit')->name('person.edit');
Route::put('admin/person/{id}', 'App\Http\Controllers\Admin\PersonController@update')->name('person.update');
Route::get('admin/person/create', 'App\Http\Controllers\Admin\PersonController@create')->name('person.create');
Route::post('admin/person', 'App\Http\Controllers\Admin\PersonController@store')->name('person.store');
Route::get('admin/person', 'App\Http\Controllers\Admin\PersonController@index')->name('person.index');

Route::get('admin/balanced_brackets', 'App\Http\Controllers\Admin\BalancedBracketController@index')->name('balancedBracket.index');
Route::post('admin/balanced_brackets', 'App\Http\Controllers\Admin\BalancedBracketController@checkBrackets')->name('balancedBracket.checkBrackets');


Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

