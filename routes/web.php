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

// fix to get medias from public folder with CORS activated
Route::get('/media/{name}', function ($name) {
    $myFile = public_path('medias/'.$name);
    return response()->download($myFile) ;
});

