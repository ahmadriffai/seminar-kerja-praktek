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


// Admin
Route::namespace("Admin")->prefix("admin")->name("admin.")->group(function (){
    /*
     * Mahasiswa
     */
    Route::prefix("mahasiswa")->name("mahasiswa.")->group(function (){
        Route::get("/", "MahasiswaController@index")->name("index");
        Route::get("/add", "MahasiswaController@add")->name("add");
        Route::post("/add", "MahasiswaController@addPost")->name("add-post");
        Route::get("/delete/{nim}", "MahasiswaController@delete")->name("delete");
        Route::get("/edit/{nim}", "MahasiswaController@edit")->name("edit");
        Route::post("/edit/{nim}", "MahasiswaController@editPost")->name("edit-post");
        Route::get("/search", "MahasiswaController@search")->name("search");
        Route::post("/import", "MahasiswaController@importPost")->name("import-post");
    });


});
