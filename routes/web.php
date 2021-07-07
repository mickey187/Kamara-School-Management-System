<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\SubjectGroupController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;

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

Route::get('viewsubjectgroup', [SubjectController::class, 'viewSubjectGroup'])->name('viewsubjectgroup');

Route::post('addsubjectgroup', [SubjectController::class, 'addSubjectGroup']);




//class

Route::get('/indexAddClassSubject', [ClassController::class, 'indexAddClassSubject'])->name('/indexAddClassSubject');

Route::get('/viewClassSubject', [ClassController::class, 'viewClassSubject'])->name('/viewClassSubject');

Route::post('addClassSubject', [ClassController::class, 'addClassSubject']);

Route::post('delete_class_subject', [ClassController::class, 'deleteClassSubject']);

Route::get('/editClassSubject/{id}/{id_sub}', [ClassController::class, 'editClassSubject'])->name('/editClassSubject');

Route::post('/editClassSubjectValue/{id_cls}', [ClassController::class, 'editClassSubjectValue']);

//stream
Route::get('/addStream', [StreamController::class, 'index'])->name('/addStream');

Route::get('/viewStream', [StreamController::class, 'viewStream'])->name('/viewStream');

Route::post('addStream', [StreamController::class, 'addStream']);

Route::post('/deletestream', [StreamController::class, 'deleteStream']);

Route::get('/editstream/{id}', [StreamController::class, 'editStream'])->name('/editstream');

Route::post('/editstreamvalue/{id}', [StreamController::class, 'editStreamValue']);








Route::get('addclasslabel', [ClassController::class, 'indexClassLabel']);

Route::post('addclasslabel', [ClassController::class, 'addClassLabel']);

Route::get('viewclasslabel', [ClassController::class, 'viewclasslabel'])->name('viewclasslabel');

Route::get('viewcourse/{bv}', [ClassController::class, 'viewCourse']);

Route::get('getsubjects/{class_group}', [ClassController::class, 'getSubjects']);

Route::post('/deleteclasslabel', [ClassController::class, 'deleteClassLabel']);

Route::get('editclasslabel/{id}', [ClassController::class, 'editClassLabel'])->name('editclasslabel');

Route::get('editclasslabelvalue/{id}', [ClassController::class, 'editClassLabelValue']);





//Role

Route::get('indexaddrole', [RoleController::class, 'indexAddRole']);

Route::post('addrole', [RoleController::class, 'addRole']);

Route::get('viewrole', [RoleController::class, 'viewRole'])->name('viewrole');

Route::get('editrole/{id}', [RoleController::class, 'editRole'])->name('editrole');

Route::post('editrolevalue/{id}', [RoleController::class, 'editRoleValue']);

Route::post('/deleterole', [RoleController::class, 'deleteRole']);


// Student

Route::post('newStudent', [StudentController::class, 'insert']);
Route::get('add_student', [StudentController::class, 'index']);
Route::get('view_student',[StudentController::class, 'retriveAll']);
Route::get('edit_student_form/{id}',[StudentController::class, 'retrive']);
Route::post('edit_student_value/{id}',[StudentController::class, 'update']);


// parent

Route::get('newParent/{id}',[ParentController::class, 'addMore']);
Route::get('studentParentList/{id}',[ParentController::class, 'retrive']);
Route::get('addNewParent/{id}',[ParentController::class, 'insertParent']);
Route::get('updateParent/{id}',[ParentController::class, 'editPage']);

