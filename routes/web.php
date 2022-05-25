<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Techinfo;
use App\Models\techtime;

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
    $currDate = date('Y-m-d');

    $data1 = DB::table('techtimes')
    ->join('techinfos','techtimes.techID','=','techinfos.id')
    ->where('type','=','Short')
    ->where('techDate','=',$currDate)
    ->get();

    $data2 = DB::table('techtimes')
    ->join('techinfos','techtimes.techID','=','techinfos.id')
    ->where('type','=','Long')
    ->where('techDate','=',$currDate)
    ->get();

    return view('layouts.monitoring',['data1' => $data1, 'data2' => $data2]);
});

Route::post("timeStamp", [App\Http\Controllers\API\TechTimeController::class, 'timeStamp'])->name('timeStamp');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get("search", [App\Http\Controllers\API\TechInfoController::class, 'search']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('{path}', [App\Http\Controllers\HomeController::class, 'index'])->where('path', '([A-z]+)?');
