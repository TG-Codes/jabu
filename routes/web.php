<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'view'])->name('home');

Route::post('addtask', [Controller::class, 'submitTask'])->name('submittask');
Route::get('duetoday', [Controller::class, 'dueToday'])->name('duetoday');
Route::get('overdue', [Controller::class, 'overdue'])->name('overdue');
Route::get('duetomorrow', [Controller::class, 'dueTomorrow'])->name('duetomorrow');
Route::get('duenextweek', [Controller::class, 'dueNextWeek'])->name('duenextweek');
Route::get('completed', [Controller::class, 'completed'])->name('completed');
Route::get('markcomplete/{id}', [Controller::class, 'markcomplete'])->name('markcomplete');
Route::get('markuncomplete/{id}', [Controller::class, 'markcomplete'])->name('markuncomplete');