<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OfferController;
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

Route::get('/', fn() => view('pages.dashboard'))->name('dashboard');

Route::resource('offers', OfferController::class);
Route::resource('companies', CompanyController::class);

Route::get('/motor-remotes', function () {
    $remotes = \App\Models\MotorRemote::with('remote')->where('motor_id', request()->get('motor_id'))->get();

    return response()->json($remotes);
})->name('motor-remotes');

Route::get('/fabric-types', function () {
    $fabricTypes = \App\Models\FabricType::where('fabric_id', request()->get('fabric_id'))->get();

    return response()->json($fabricTypes);
})->name('fabric-types');
