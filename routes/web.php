<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\SubjectGroupController;
use App\Http\Controllers\EmployeeRegistrationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeRoomController;
use App\Http\Controllers\ListEmployeeController;
use App\Http\Controllers\ListTeacherController;
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


//subject
Route::get('/subject', [SubjectController::class, 'index']);

Route::get('/viewSubject', [SubjectController::class, 'viewSubject'])->name('/viewSubject');

Route::get('editsubject/{id}', [SubjectController::class, 'editSubject'])->name('editsubject');

Route::post('editsubjectvalue/{id}', [SubjectController::class, 'editSubjectValue']);

Route::post('addsubject', [SubjectController::class, 'addSubject']);

Route::post('deletesubject', [SubjectController::class, 'deleteSubject']);


//subject group

Route::get('/addsubjectgroup', [SubjectController::class, 'indexSubjectGroup'])->name('addsubjectgroup');

Route::post('addsubjectgroup', [SubjectController::class, 'addSubjectGroup']);




//class

Route::get('/class', [ClassController::class, 'index'])->name('/class');

Route::get('/viewClass', [ClassController::class, 'viewClass'])->name('/viewClass');

Route::post('addClass', [ClassController::class, 'addClass']);

Route::get('/addStream', [StreamController::class, 'index']);

Route::get('/viewStream', [StreamController::class, 'viewStream'])->name('/viewStream');

Route::post('addStream', [StreamController::class, 'addStream']);



 Route::get('/addEmployee',[EmployeeRegistrationController::class, 'store']);
Route::get('/addEmployeeForm',[EmployeeRegistrationController::class, 'form']);
Route::get('/addTeacher',[TeacherController::class, 'store']);
Route::get('/addTeacherForm',[TeacherController::class, 'form']);
Route::get('/addHomeRoom',[HomeRoomController::class, 'openView']);
Route::get('/listEmployee',[ListEmployeeController::class, 'listEmployee']);
Route::get('/listTeacher',[ListTeacherController::class, 'listTeacher']);

Route::get('/edit_employee/{id}',[ListEmployeeController::class, 'getEmployee']);
Route::get('/update_employee/{id}',[EmployeeRegistrationController::class, 'update']);

Route::get('/delete_employee/{id}',[ListEmployeeController::class,'removeEmployee']);
Route::get('/trash_employee/{id}',[EmployeeRegistrationController::class,'delete']);

Route::get('/edit_teacher/{id}',[ListTeacherController::class, 'getTeacher']);
Route::get('/update_teacher/{id}',[ListTeacherController::class, 'update']);
Route::get('/delete_teacher/{id}',[ListTeacherController::class,'deleteTeacher']);
Route::get('find_employee',[ListEmployeeController::class, 'findEmployee']);

