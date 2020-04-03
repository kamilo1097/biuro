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
Route::get('/rezerwacje', "RezerwacjeController@index");

Route::get("gdata", "RezerwacjeController@getData")->name('get.Data');
Route::get("gstan", "RezerwacjeController@getStanowiska")->name('get.Stanowiska');

Route::get("/stanowisko/{id}", "RezerwacjeController@edytujStanowisko");

Route::post("/rezerwacje/Dodaj", "RezerwacjeController@dodajRezerwacje")->name('rezerwacje.Dodaj');
Route::post("/rezerwacje/spr", "RezerwacjeController@sprawdzWolneStanowiska")->name('rezerwacje.Spr');
