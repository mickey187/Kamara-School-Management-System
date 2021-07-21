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
use App\Http\Controllers\MarklistController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\SectionController;
use GrahamCampbell\ResultType\Success;
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

// Route::get('/fetchStudent/{class_id}/{stream_id}',[SectionController::class, 'fetchStudent']);
// Route::get('/', function () {
//     return view('/admin/dashboard');
// });



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';



//Finance Route Group
Route::middleware(['auth','role:Admin,Finance,null'])->group(function () {

Route::get('/indexAddPaymentType',[FinanceController::class, 'indexAddPaymentType']);

Route::get('/viewPaymentType',[FinanceController::class, 'viewPaymentType']);

Route::post('/addPaymentType',[FinanceController::class, 'addPaymentType']);

Route::get('/indexAddPaymentLoad',[FinanceController::class, 'indexAddPaymentLoad']);

Route::post('/addPaymentLoad',[FinanceController::class, 'AddPaymentLoad']);

Route::get('/viewPaymentLoad',[FinanceController::class, 'viewPaymentLoad']);

Route::get('/fetchload/{class_id}/{pay_type}/{stud_id}',[FinanceController::class, 'fetchLoad']);

Route::get('/fetchTotalPaymentLoad/{class_id}/{stud_id}',[FinanceController::class, 'fetchTotalPaymentLoad']);

Route::get('/fetchpaymenthistory/{stud_id}',[FinanceController::class, 'fetchPaymentHistory']);

Route::get('/makeTotalPayment/{stud_id}/{month}',[FinanceController::class, 'makeTotalPayment']);



Route::get('/indexAddStudentTransportation',[FinanceController::class, 'indexAddStudentTransportation']);

Route::get('/fetchstudentTransportLoad/{stud_id}',[FinanceController::class, 'fetchstudentTransportLoad']);

Route::get('/registerForTransport/{student_table_id}/{payment_load_id}',[FinanceController::class, 'registerForTransport']);



Route::get('/indexAddStudentPayment',[FinanceController::class, 'indexAddStudentPayment']);

Route::get('/viewStudentPayment',[FinanceController::class, 'viewStudentPayment']);

Route::post('/addStudentPayment',[FinanceController::class, 'addStudentPayment']);



Route::get('/indexAddStudentDiscount',[FinanceController::class, 'indexAddStudentDiscount']);

Route::post('/addStudentDiscount',[FinanceController::class, 'addStudentDiscount']);

Route::get('fetchstudent/{stud_id}',[FinanceController::class, 'fetchStudent']);

Route::get('/viewStudentDiscount',[FinanceController::class, 'viewStudentDiscount']);

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

Route::get('/editClassSubject/{id}', [ClassController::class, 'editClassSubject'])->name('/editClassSubject');

Route::post('/editClassSubjectValue/{id_cls}', [ClassController::class, 'editClassSubjectValue']);

//stream
Route::get('/addStream', [StreamController::class, 'index'])->name('/addStream');

Route::get('/viewStream', [StreamController::class, 'viewStream'])->name('/viewStream');

Route::post('addStream', [StreamController::class, 'addStream']);

// Employee Controller

Route::get('/addEmployee',[EmployeeRegistrationController::class, 'store']);
Route::get('/addEmployeeForm',[EmployeeRegistrationController::class, 'form']);
Route::get('/addTeacher',[TeacherController::class, 'store']);
Route::get('/addTeacherForm',[TeacherController::class, 'form']);
Route::get('/addHomeRoom',[HomeRoomController::class, 'openView']);
Route::get('/listEmployee',[ListEmployeeController::class, 'listEmployee']);
Route::get('/listTeacher',[ListTeacherController::class, 'listTeacher']);
Route::get('teacher_classes/{id}',[ListTeacherController::class, 'teacher_classes']);

Route::get('/edit_employee/{id}',[ListEmployeeController::class, 'getEmployee']);
Route::get('/update_employee/{id}',[EmployeeRegistrationController::class, 'update']);

Route::get('/delete_employee/{id}',[ListEmployeeController::class,'removeEmployee']);
Route::get('/trash_employee/{id}',[EmployeeRegistrationController::class,'delete']);

Route::get('/edit_teacher/{id}',[ListTeacherController::class, 'getTeacher']);
Route::get('/update_teacher/{id}',[ListTeacherController::class, 'update']);
Route::get('/delete_teacher/{id}',[ListTeacherController::class,'deleteTeacher']);
Route::get('find_employee',[ListEmployeeController::class, 'findEmployee']);
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
Route::post('new_student', [StudentController::class, 'insert']);
Route::get('add_student', [StudentController::class, 'index']);
Route::get('view_student',[StudentController::class, 'retriveAll']);
Route::get('edit_student_form/{id}',[StudentController::class, 'retrive']);
Route::post('edit_student_value/{id}',[StudentController::class, 'update']);
Route::get('student_enrollment',[StudentController::class, 'enroll']);
Route::get('find_student',[StudentController::class, 'findStudent']);
Route::get('findStudent/{id}',[StudentController::class, 'getStudent']);
Route::get('register/{id}',[StudentController::class, 'register']);
Route::get('marklist/{id}',[StudentController::class, 'marklist']);



// parent

Route::get('newParent/{id}',[ParentController::class, 'addMore']);
Route::get('studentParentList/{id}',[ParentController::class, 'retrive']);
Route::get('addNewParent/{id}',[ParentController::class, 'insert']);
Route::get('updateParent/{id}',[ParentController::class, 'editPage']);
Route::get('insertUpdatedParent/{id}',[ParentController::class, 'update']);
Route::get('addNewParent',[ParentController::class, 'retriveAll']);
Route::get('deleteParent',[ParentController::class, 'deleteParent']);
Route::get('view_parents',[ParentController::class, 'retriveAll']);

// admin
Route::get('dashboard',[StudentController::class, 'adminDashboard']);

//marklist
Route::get('addMarkList',[MarklistController::class, 'addMarkListForm']);
Route::post('/import',[MarklistController::class, 'import'])->name('import');
Route::get('addAssasment',[MarklistController::class, 'addAssasment']);
Route::get('Assasmentform',[MarklistController::class, 'assasmentForm']);

//Section
Route::get('sectionForm',[SectionController::class, 'index']);
Route::get('setSection',[SectionController::class, 'setSection']);
Route::get('findSection/{id}',[SectionController::class, 'findSection']);
Route::get('setCourseLoad/{teacher}/{section}/{class}/{subject}',[SectionController::class, 'setCourseLoad']);
Route::get('SetHomeRoom/{teacher}/{section}/{class}',[SectionController::class, 'setHomeRoom']);

Route::get('getCourseLoad/{id}',[SectionController::class, 'getCourseLoad']);
Route::get('deleteCourseLoad/{load_id}',[SectionController::class, 'deleteCourseLoad']);
Route::get('getHomeRoom/{teacher_id}',[SectionController::class, 'getHomeRoom']);
Route::get('deleteHomeRoom/{hoom_room_id}',[SectionController::class, 'deleteHomeRoom']);



//For Testing
Route::post('/sample_student',[MarklistController::class, 'sample_student'])->name('sample_student');;
Route::post('/sample_student',[MarklistController::class, 'sample_student'])->name('sample_student');;
Route::get('addSemister',[SectionController::class, 'semister']);
Route::get('addSemisterI',[SectionController::class, 'insertSemister']);



require __DIR__.'/auth.php';
