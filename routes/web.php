<?php

use App\TestTask\Controllers\Bookmark\AddController;
use App\TestTask\Controllers\Bookmark\DetailController;
use App\TestTask\Controllers\IndexController;
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

Route::get("/", [IndexController::class, "index"])
    ->name("index");

Route::get("/new", function () {
    return view("new", ["error" => false]);
});

Route::post("/new", [AddController::class, "index"])
    ->name("new");

Route::get("/detail", [DetailController::class, "index"])
    ->name("detail");
