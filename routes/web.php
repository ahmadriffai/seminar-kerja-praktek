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

// Guest
Route::namespace("Guest")->name("guest.")->group(function () {
    Route::get("/", "HomeController@index")->name("index");


    Route::prefix("user")->name("user.")->group(function (){
        Route::get("/account-register/{mahasiswa}", "UserController@accountRegister")->name("account-register");
        Route::post("/account-register/{mahasiswa}", "UserController@accountRegisterPost")->name("account-register-post");
        Route::get("/account-register", "UserController@checkNIM")->name("check-nim");
        Route::post("/account-register", "UserController@checkNIMPost")->name("check-nim-post");
        Route::get("/login", "UserController@login")->name("login");
        Route::post("/login", "UserController@loginPost")->name("login-post");
        Route::get("/login-admin", "UserController@loginAdmin")->name("login-admin");
        Route::post("/login-admin", "UserController@loginAdminPost")->name("login-admin-post");
        Route::get("/logout", "UserController@logout")->name("logout");
    });

    // seminar
    Route::prefix("seminar")->name("seminar.")->group(function (){
        Route::get("/detail/{id}", "SeminarController@detail")->name("detail");
        Route::get("/list", "SeminarController@list")->name("list");
        Route::get("/search", "SeminarController@search")->name("search");

    });
    // peserta seminar
    Route::prefix("peserta-seminar")->name("peserta-seminar.")->group(function (){
        Route::post("/daftar/{seminar}", "PesertaSeminarController@registration")->name("daftar");
    });
});

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
    /*
     * Seminar
     */
    Route::prefix("seminar")->name("seminar.")->group(function (){
        Route::get("/", "SeminarController@index")->name("index");
        Route::get("/add", "SeminarController@add")->name("add");
        Route::post("/add", "SeminarController@addPost")->name("add-post");
    });


});

// Mahasiswa
Route::namespace("Mahasiswa")->prefix("mahasiswa")->name("mahasiswa.")->group(function (){
    /*
     * Seminar
     */
    Route::prefix("seminar")->name("seminar.")->group(function (){
        Route::get("/", "SeminarController@registered")->name("registered");
    });


});
