<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
// 	return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();
Route::get('/', [ShortLinkController::class, 'index'])->middleware(['auth']);
Route::post('/generate_link', [ShortLinkController::class, 'generate_link'])->name('generate_link');

Route::get('/{shortLink}', [ShortLinkController::class, 'goto_link'])->name('goto_link');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
