<?php
use App\Http\Controllers\AddJobPositionController;
use App\Http\Controllers\AddReligionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\SubjectGroupController;
use App\Http\Controllers\EmployeeRegistrationController;
use App\Http\Controllers\ExcelController;
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
use App\Http\Controllers\StudentPersonalDevelopmentController;
use GrahamCampbell\ResultType\Success;

Route::get('generatedox',[StudentController::class, 'generateDocx']);


Route::get('/fetchStudent/{class_id}/{stream_id}',[SectionController::class, 'fetchStudent']);

Route::redirect('/', '/login');

Route::middleware(['role:admin,finance,null'])->prefix('finance')->group(function () {

Route::get('/financeDashboard',[FinanceController::class, 'financeDashboard'])->name('finance/financeDashboard');

Route::get('/getYealyEarnings',[FinanceController::class, 'getYealyEarnings'])->name('finance/getYealyEarnings');

Route::get('/indexAddPaymentType',[FinanceController::class, 'indexAddPaymentType']);

Route::get('/viewPaymentType',[FinanceController::class, 'viewPaymentType']);

Route::get('/addPaymentType',[FinanceController::class, 'addPaymentType']);

Route::get('/editPaymentType',[FinanceController::class, 'editPaymentType']);

Route::get('/deletePaymentType',[FinanceController::class, 'deletePaymentType']);

Route::get('/indexAddPaymentLoad',[FinanceController::class, 'indexAddPaymentLoad']);

Route::get('/addPaymentLoad/{class_selected}',[FinanceController::class, 'AddPaymentLoad'])->name('addPaymentLoad');

Route::get('/editPaymentLoad',[FinanceController::class, 'editPaymentLoad'])->name('editPaymentLoad');

Route::get('/deletePaymentLoad',[FinanceController::class, 'deletePaymentLoad']);

Route::get('/viewPaymentLoad',[FinanceController::class, 'viewPaymentLoad']);

Route::get('/fetchload/{class_id}/{pay_type}/{stud_id}/{selected_individual_payment}',[FinanceController::class, 'fetchLoad']);

Route::get('/fetchTotalPaymentLoad/{class_id}/{stud_id}',[FinanceController::class, 'fetchTotalPaymentLoad']);

Route::get('/fetchpaymenthistory/{stud_id}',[FinanceController::class, 'fetchPaymentHistory']);

Route::get('/makeTotalPayment/{stud_id}/{month}/{fs_number}',[FinanceController::class, 'makeTotalPayment']);



Route::get('/indexAddStudentTransportation',[FinanceController::class, 'indexAddStudentTransportation']);

Route::get('/fetchstudentTransportLoad/{stud_id}',[FinanceController::class, 'fetchstudentTransportLoad']);

Route::get('/registerForTransport/{student_table_id}/{payment_load_id}',[FinanceController::class, 'registerForTransport']);

Route::get('/showStudentsRegsiteredForTransport',[FinanceController::class, 'showStudentsRegsiteredForTransport']);


Route::get('/indexAddStudentPayment',[FinanceController::class, 'indexAddStudentPayment']);

Route::get('/viewStudentPayment',[FinanceController::class, 'viewStudentPayment']);

Route::post('/addStudentPayment',[FinanceController::class, 'addStudentPayment']);

Route::get('/makeIndividualPayment/{student_id_for_payment}/{month}/{fs_number}',[FinanceController::class, 'makeIndividualPayment']);

Route::get('/indexAddStudentDiscount',[FinanceController::class, 'indexAddStudentDiscount']);

Route::post('/addStudentDiscount',[FinanceController::class, 'addStudentDiscount']);

Route::get('fetchstudent/{stud_id}',[FinanceController::class, 'fetchStudent']);

Route::get('/showStudentsWithDiscount',[FinanceController::class, 'showStudentsWithDiscount']);

Route::get('/showStudentsRegisteredForSchoolTrip',[FinanceController::class, 'showStudentsRegisteredForSchoolTrip']);

Route::get('/showStudentsRegisteredForGraduation',[FinanceController::class, 'showStudentsRegisteredForGraduation']);

Route::get('/showStudentsRegisteredForSummerCamp',[FinanceController::class, 'showStudentsRegisteredForSummerCamp']);

Route::get('/showStudentsRegisteredForTutorial',[FinanceController::class, 'showStudentsRegisteredForTutorial']);

Route::get('/studentPayment',[FinanceController::class, 'studentPayment']);

Route::get('/searchStudentForPaymentRegistration/{stud_id}',[FinanceController::class, 'searchStudentForPaymentRegistration']);

Route::get('/registerStudentForPayment/{stud_id}',[FinanceController::class, 'registerStudentForPayment']);

Route::get('/checkFsNumberExists/{fs_number}',[FinanceController::class, 'checkFsNumberExists']);

Route::get('/fetchStudentPaymentLoad/{stud_id}',[FinanceController::class, 'fetchStudentPaymentLoad']);

Route::get('/fetchPaymentLoadDetail',[FinanceController::class, 'fetchPaymentLoadDetail']);



});
//subject
Route::get('/subject', [SubjectController::class, 'index']);

Route::get('/viewSubject', [SubjectController::class, 'viewSubject'])->name('/viewSubject');

Route::get('editsubject/{id}', [SubjectController::class, 'editSubject'])->name('editsubject');

Route::post('editsubjectvalue/{id}', [SubjectController::class, 'editSubjectValue']);

Route::post('/addsubject', [SubjectController::class, 'addSubject']);

Route::post('deletesubject', [SubjectController::class, 'deleteSubject']);

//subject group
Route::get('subjectGroup/{classes}/{subjects}', [SubjectController::class, 'subjectGroup']);

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
Route::get('/addReligionPage',[AddReligionController::class,'addReligionPage']);
// Route::get('addReligion',[AddReligionController::class,'addReligion']);

Route::get('addReligion/{religion}',[AddReligionController::class,'addReligion']);

Route::get('/viewReligion',[AddReligionController::class,'viewReligion'])->name('viewReligion');

Route::get('editReligion/{id}', [AddReligionController::class, 'editReligion'])->name('editReligion');

Route::get('editReligionValue/{id}',[AddReligionController::class,'editReligionValue']);

Route::get('/deleteReligion', [AddReligionController::class, 'deleteReligion']);

Route::get('/indexAddJobPosition',[AddJobPositionController::class,'indexAddJobPosition']);

Route::get('addJobPosition/{position}',[AddJobPositionController::class,'addJobPosition']);

Route::get('/viewJobPosition',[AddJobPositionController::class,'viewJobPosition'])->name('viewJobPosition');

Route::get('editJobPosition/{id}', [AddJobPositionController::class, 'editJobPosition'])->name('editJobPosition');

Route::get('editPositionValue/{id}',[AddJobPositionController::class,'editPositionValue']);

Route::get('/deleteJobPosition', [AddJobPositionController::class, 'deleteJobPosition']);

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

Route::get('/delete_employee',[ListEmployeeController::class,'removeEmployee']);
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

// Teacher Dashboard

Route::get('teacherDashBoard', [TeacherController::class,'teacherDashBoard']);

Route::get('my_student/teacherDashBoard', [TeacherController::class,'teacherDashBoard']);

Route::get('my_student/{id}', [TeacherController::class,'myStudent']);

Route::get('my_student/getClassSection/{class_Label}/{section}', [TeacherController::class,'getClassAndSection']);

//Role

Route::get('indexaddrole', [RoleController::class, 'indexAddRole']);

Route::get('addrole', [RoleController::class, 'addRole']);

Route::get('viewrole', [RoleController::class, 'viewRole'])->name('viewrole');

Route::get('editrole/{id}', [RoleController::class, 'editRole'])->name('editrole');

Route::get('editrolevalue/{id}', [RoleController::class, 'editRoleValue']);

Route::get('/deleterole', [RoleController::class, 'deleteRole']);

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

Route::get('my_student/marklist/{id}',[StudentController::class, 'teacherMarklist']);

// parent

Route::get('newParent/{id}',[ParentController::class, 'addMore']);

Route::get('studentParentList/{id}',[ParentController::class, 'retrive']);

Route::get('addNewParent/{id}',[ParentController::class, 'insert']);

Route::get('updateParent/{id}',[ParentController::class, 'editPage']);

Route::get('insertUpdatedParent/{id}',[ParentController::class, 'update']);

Route::get('addNewParent',[ParentController::class, 'retriveAll']);

Route::get('deleteParent',[ParentController::class, 'deleteParent']);

Route::get('view_parents',[ParentController::class, 'retriveAll']);

Route::get('/parentDashboard',[ParentController::class, 'ParentDashboard']);

Route::get('/veiwParentPaymentDetail',[ParentController::class, 'veiwParentPaymentDetail']);

// admin
Route::get('dashboard',[StudentController::class, 'adminDashboard']);

//marklist

Route::get('addMarkList',[MarklistController::class, 'addMarkListForm']);

Route::get('singleAddMarkList/{student_id}/{class_id}/{semister_id}/{assasment_id}/{subject}/{mark}/{load}',
[MarklistController::class, 'singleAddMarkList']);

Route::post('/import',[MarklistController::class, 'import'])->name('import');

Route::post('importExcel',[ExcelController::class, 'importExcel'])->name('importExcel');
// Route::post('/importExcel/{gclass}/{gstream}/{gsection}',[ExcelController::class, 'importExcel'])->name('importExcel');

Route::get('addAssasment',[MarklistController::class, 'addAssasment']);

Route::get('Assasmentform',[MarklistController::class, 'assasmentForm']);

Route::get('editMarkStudentList/{id}/{mark}/{load}/{assasment}',[MarklistController::class, 'editMarkStudentList']);

//Section

Route::get('sectionForm',[SectionController::class, 'index']);

Route::get('getHomeRoomStudent/{teacher_id}/{section}/{class_name}/{stream}',[SectionController::class, 'getHomeRoomStudent']);

Route::get('getCourseLoadStudent/{teacher_id}/{section}/{class_id}/{course_load_id}/{stream}',[SectionController::class, 'getCourseLoadStudent']);

Route::get('setSection/{class_id}/{stream_id}/{section}/{room}',[SectionController::class, 'setSection']);

Route::get('findSection/{id}',[SectionController::class, 'findSection']);

Route::get('setCourseLoad/{teacher}/{section}/{class}/{subject}',[SectionController::class, 'setCourseLoad']);

Route::get('SetHomeRoom/{teacher}/{section}/{class}',[SectionController::class, 'setHomeRoom']);

Route::get('getCourseLoad/{id}',[SectionController::class, 'getCourseLoad']);

Route::get('deleteCourseLoad/{load_id}',[SectionController::class, 'deleteCourseLoad']);

Route::get('getHomeRoom/{teacher_id}',[SectionController::class, 'getHomeRoom']);

Route::get('deleteHomeRoom/{hoom_room_id}',[SectionController::class, 'deleteHomeRoom']);

Route::get('setCurrentSemister/{id}',[SectionController::class, 'setCurrentSemister']);

Route::get('customSection/{section}/{student}',[SectionController::class, 'customSection']);

Route::get('getSectionedClasses',[SectionController::class, 'getSectionedClasses']);

Route::get('getNotSectionedClasses',[SectionController::class, 'getNotSectionedClasses']);



//For Testing

Route::post('/sample_student',[MarklistController::class, 'sample_student'])->name('sample_student');

Route::post('/sample_student',[MarklistController::class, 'sample_student'])->name('sample_student');

Route::get('addSemister',[SectionController::class, 'semister']);

Route::get('addSemisterI',[SectionController::class, 'insertSemister']);

Route::get('exportstudent/{class}/{stream}/{section}/{assasmnet}/{courseLoad}/{subject}', [ExcelController::class, 'export']);

Route::get('generateStudentCard', [MarklistController::class, 'generateTotalCard']);

// Student Traits

Route::get('addStudentTraits/{value}', [StudentPersonalDevelopmentController::class, 'addStudentTraits']);


require __DIR__.'/auth.php';
