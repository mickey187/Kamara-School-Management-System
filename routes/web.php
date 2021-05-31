<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StreamController;

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
    return view('/layouts/master');
});

Route::get('/subject', [SubjectController::class, 'openView']);

Route::post('addsubject', [SubjectController::class, 'addSubject']);

Route::get('/class', [ClassController::class, 'showSubjectList']);

Route::post('addClass', [ClassController::class, 'addClass']);

Route::get('/addStream', [StreamController::class, 'openView']);

Route::post('addStream', [StreamController::class, 'addStream']);
