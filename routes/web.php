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
    return view('welcome');
});

Route::get('/property-details', 'Property_details@index'); 
Route::get('/form-validation', 'Property_details@form_validation'); 
Route::get('/properties', 'AjaxController@viewPropertyForDatatable')->name("ajax.properties");
Route::post('/saveProperties', 'Property_details@savePropertyDetail')->name("save.properties");