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
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentPersonalDevelopmentController;
use GrahamCampbell\ResultType\Success;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\Curriculum;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeInformationController;
use App\Models\employee;
use App\Http\Controllers\ExportController;
use App\Models\assasment_type;
use Illuminate\Support\Facades\Storage;

Route::get('generatedox',[StudentController::class, 'generateDocx']);


Route::get('/fetchStudent/{class_id}/{stream_id}',[SectionController::class, 'fetchStudent']);

Route::redirect('/', '/login');

Route::middleware(['role:null,finance,null'])->prefix('finance')->group(function () {

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

Route::get('/editStudentTransportInfo/{student_id}/{payment_load_id}/{discount_percent}',[FinanceController::class, 'editStudentTransportInfo']);

Route::get('/deleteTransportDetail/{student_id}/{payment_load_id}',[FinanceController::class, 'deleteTransportDetail']);





});

//user management

Route::middleware(['role:admin,null,null'])->prefix('account')->group(function () {

Route::get('/indexUserAccount',[UserManagementController::class,'indexUserAccount']);

Route::get('/addRole/{role_name}', [UserManagementController::class, 'addRole']);

Route::get('/viewRole', [UserManagementController::class, 'viewRole']);

Route::get('/createAccount/{user_name}/{email}/{role_id}/{password}', [UserManagementController::class, 'createAccount']);

Route::get('/viewUserAccount', [UserManagementController::class, 'viewUserAccount']);
});

// Curriculum

 Route::get('/indexCurriculum', [Curriculum::class,'indexCurriculum']);

 Route::get('/addClass', [Curriculum::class, 'addClass']);
 Route::get('/viewClass', [Curriculum::class, 'viewClass']);
 Route::get('/edit_class_label', [Curriculum::class, 'edit_class_label']);
 Route::get('/delete_class_label', [Curriculum::class, 'delete_class_label']);


 Route::get('/indexAddSubject',[Curriculum::class,'indexAddSubject']);
 Route::get('/view_subject', [Curriculum::class, 'view_subject']);
 Route::get('/view_subject_group', [Curriculum::class, 'view_subject_group'])->name('view_subject_group');
 Route::get('get_subject_for_period/{class}', [Curriculum::class, 'get_subject_for_period']);
 Route::get('set_subject_period/{class}/{period}/{subject}', [Curriculum::class, 'set_subject_period']);


 Route::get('/edit_subject', [Curriculum::class, 'edit_subject']);
 Route::get('/delete_subject', [Curriculum::class, 'delete_subject']);


 Route::get('/indexaddStream',[Curriculum::class,'indexaddStream']);
 Route::get('/view_stream', [Curriculum::class, 'view_stream']);
 Route::get('/edit_stream', [Curriculum::class, 'edit_stream']);
 Route::get('/delete_stream', [Curriculum::class, 'delete_stream']);


// });
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



// Subject Period

Route::get('getSubjectForPeriod/{class}', [SubjectController::class, 'getSubjectForPeriod']);

Route::get('setSubjectPeriod/{class}/{period}/{subject}', [SubjectController::class, 'setSubjectPeriod']);

//class

Route::get('/indexAddClassSubject', [ClassController::class, 'indexAddClassSubject']);

Route::get('/viewClassSubject', [ClassController::class, 'viewClassSubject'])->name('/viewClassSubject');

Route::get('addClassSubject', [ClassController::class, 'addClassSubject']);

Route::post('delete_class_subject', [ClassController::class, 'deleteClassSubject']);

Route::get('/editClassSubject/{id}', [ClassController::class, 'editClassSubject'])->name('/editClassSubject');

Route::post('/editClassSubjectValue/{id_cls}', [ClassController::class, 'editClassSubjectValue']);

//stream
Route::get('/addStream', [StreamController::class, 'index'])->name('/addStream');

Route::get('/viewStream', [StreamController::class, 'viewStream'])->name('/viewStream');

Route::post('addStream', [StreamController::class, 'addStream']);

// employee information

Route::get('/indexEmployee', [EmployeeInformationController::class,'indexEmployee']);

 Route::get('/add_position', [EmployeeInformationController::class, 'add_position'])->name('add_position');
 Route::get('/view_position', [EmployeeInformationController::class, 'view_position']);
 Route::get('/edit_job_position', [EmployeeInformationController::class, 'edit_job_position'])->name('edit_job_position');
 Route::get('/deleteJobPosition', [EmployeeInformationController::class, 'deleteJobPosition']);

 Route::get('/add_religion',[EmployeeInformationController::class,'add_religion']);
 Route::get('/view_religion', [EmployeeInformationController::class, 'view_religion']);
 Route::get('/edit_religion',[EmployeeInformationController::class,'edit_religion'])->name('edit_religion');
 Route::get('/delete_religion', [EmployeeInformationController::class, 'delete_religion']);


// Employee Controller
// Route::get('/addReligionPage',[AddReligionController::class,'addReligionPage']);

// Route::get('/addReligion',[AddReligionController::class,'addReligion'])->name('/addReligion');

// Route::get('/viewReligion',[AddReligionController::class,'viewReligion'])->name('/viewReligion');

Route::get('editReligion/{id}', [AddReligionController::class, 'editReligion'])->name('editReligion');

Route::get('/indexAddJobPosition',[AddJobPositionController::class,'indexAddJobPosition']);

// Route::get('/addJobPosition',[AddJobPositionController::class,'addJobPosition'])->name(('/addJobPosition'));

// Route::get('/viewJobPosition',[AddJobPositionController::class,'viewJobPosition'])->name('/viewJobPosition');



Route::get('editPositionValue/{id}',[AddJobPositionController::class,'editPositionValue']);



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

Route::get('/indexAttendance/{class_label}/{stream_type}/{section}', [AttendanceController::class,'indexAttendance']);

Route::get('/generateAttendanceList/{class_id}/{stream_id}/{section}', [AttendanceController::class,'generateAttendanceList']);

Route::get('/submitAttendance', [AttendanceController::class,'submitAttendance']);

Route::get('/viewAttendance/{class_id}/{stream_id}/{section}/{date}', [AttendanceController::class,'viewAttendance']);

Route::get('/viewAttendanceForSpecificDate/{class_id}/{stream_id}/{section}/{date}', [AttendanceController::class,'viewAttendanceForSpecificDate']);

Route::get('/editStudentAttendanceForSpecificDate/{student_id}/{class_id}/{stream_id}/{section}/{academic_calendar}/{semister_id}/{date}/{status}/{new_status}', 
[AttendanceController::class,'editStudentAttendanceForSpecificDate']);

Route::get('/indexAttendanceForParent', [ParentController::class,'indexAttendanceForParent']);

Route::get('/getCurrentYearMonthForParentAttendance', [ParentController::class,'getCurrentYearMonthForParentAttendance']);

Route::get('/viewStudentAttendanceForMonth/{year_month}', [ParentController::class,'viewStudentAttendanceForMonth']);


//Role

// Route::get('indexaddrole', [RoleController::class, 'indexAddRole']);

// Route::get('addrole', [RoleController::class, 'addRole']);

// Route::get('viewrole', [RoleController::class, 'viewRole'])->name('viewrole');

// Route::get('editrole/{id}', [RoleController::class, 'editRole'])->name('editrole');

// Route::get('editrolevalue/{id}', [RoleController::class, 'editRoleValue']);

// Route::get('/deleterole', [RoleController::class, 'deleteRole']);

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

Route::get('studentScore/{id}',[StudentController::class, 'studentScore']);

Route::get('/getStudentMarkList',[MarklistController::class, 'getStudentMarkList']);

Route::get('my_student/marklist/{id}',[StudentController::class, 'teacherMarklist']);

Route::get('/getStudentGender',[StudentController::class, 'getStudentGender']);

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

Route::get('/viewParentPaymentDetail',[ParentController::class, 'viewParentPaymentDetail']);

// admin
Route::get('dashboard',[StudentController::class, 'adminDashboard']);
Route::get('generateIdPage',[ExcelController::class, 'generateIdPage']);
Route::get('getStudentDetail/{id}',[ExcelController::class, 'getStudentDetail']);
Route::get('generateOneIdForSingleID/{id}',[ExcelController::class, 'generateOneIdForSingleID']);
Route::get('getCLassStreamSection',[ClassController::class,'getCLassStreamSection']);

Route::get('/indexHomeRoomAttendance',[AttendanceController::class, 'indexHomeRoomAttendance']);

Route::get('/getHomeRoomAttendance/{year_month}',[AttendanceController::class, 'getHomeRoomAttendance']);

//marklist

Route::get('addMarkList',[MarklistController::class, 'addMarkListForm']);

Route::get('singleAddMarkList/{student_id}/{class_id}/{semister_id}/{assasment_id}/{subject}/{mark}/{load}',
[MarklistController::class, 'singleAddMarkList']);

Route::post('/importStudent',[ExcelController::class, 'importStudent']);

Route::post('importExcel',[ExcelController::class, 'importExcel'])->name('importExcel');

Route::post('importExcel',[ExcelController::class, 'importExcel'])->name('importExcel');

// Route::post('/importExcel/{gclass}/{gstream}/{gsection}',[ExcelController::class, 'importExcel'])->name('importExcel');

Route::get('/addAssasment',[MarklistController::class, 'addAssasment'])->name('/addAssasment');

Route::get('Assasmentform',[MarklistController::class, 'Assasmentform']);

Route::get('/view_assasment_type',[MarklistController::class, 'view_assasment_type']);
Route::get('/edit_assasment_type',[MarklistController::class, 'edit_assasment_type']);
Route::get('edit_assasment_type_value/{id}',[MarklistController::class, 'edit_assasment_type_value']);
Route::get('/delete_assasment',[MarklistController::class, 'delete_assasment']);

Route::get('editMarkStudentList/{id}/{mark}/{load}/{assasment}',[MarklistController::class, 'editMarkStudentList']);

Route::get('setAvarageForClass/{classes}',[MarklistController::class, 'setAvarageForClass']);


//Section

Route::get('sectionForm',[SectionController::class, 'index']);

Route::get('getHomeRoomStudent/{teacher_id}/{section}/{class_name}/{stream}',[SectionController::class, 'getHomeRoomStudent']);

Route::get('getCourseLoadStudent/{teacher_id}/{section}/{class_id}/{course_load_id}/{stream}',[SectionController::class, 'getCourseLoadStudent']);

Route::get('setSection/{class_id}/{stream_id}/{section}/{room}',[SectionController::class, 'setSection']);

Route::get('findSection/{id}',[SectionController::class, 'findSection']);

Route::get('findSectionForHomeRoom/{id}',[SectionController::class, 'findSectionForHomeRoom']);

Route::get('getSectionForSelectedStream/{class}/{stream}',[SectionController::class, 'getSectionForSelectedStream']);

Route::get('setCourseLoad/{teacher}/{section}/{class}/{subject}',[SectionController::class, 'setCourseLoad']);

Route::get('setHomeRoom/{teacher}/{section}/{class}/{stream}',[SectionController::class, 'setHomeRoom']);

Route::get('getCourseLoad/{id}',[SectionController::class, 'getCourseLoad']);

Route::get('deleteCourseLoad/{load_id}',[SectionController::class, 'deleteCourseLoad']);

Route::get('getHomeRoom/{teacher_id}',[SectionController::class, 'getHomeRoom']);

Route::get('deleteHomeRoom/{hoom_room_id}',[SectionController::class, 'deleteHomeRoom']);

Route::get('setCurrentSemister/{id}',[SectionController::class, 'setCurrentSemister']);

Route::get('customSection/{section}/{student}',[SectionController::class, 'customSection']);

Route::get('getSectionedClasses',[SectionController::class, 'getSectionedClasses']);

Route::get('getNotSectionedClasses',[SectionController::class, 'getNotSectionedClasses']);

Route::get('getAllStudentForSectionning',[SectionController::class, 'getAllStudentForSectionning']);

Route::get('assignSectionForStudent/{student}/{section}',[SectionController::class, 'assignSectionForStudent']);

Route::get('setSectionForClass/{classes}/{stream}',[SectionController::class, 'setSectionForClass']);

Route::get('setSectionForSelectedStudent/{student}/{section}',[SectionController::class, 'setSectionForSelectedStudent']);

Route::get('setSectionAnyWayMode/{student}/{section}/{size}',[SectionController::class, 'setSectionAnyWayMode']);

Route::get('setSectionAndMergeMode/{student}/{section}/{size}',[SectionController::class, 'setSectionAndMergeMode']);

Route::get('addNewSectionAndSetMode/{student}/{section}/{size}',[SectionController::class, 'addNewSectionAndSetMode']);

Route::get('setSectionAutoMode/{student}/{size}/{roomSize}',[SectionController::class, 'setSectionAutoMode']);

Route::get('getCourseLoadData/{teacher_id}/{class_id}/{stream_id}/{section}/{subject_id}',[SectionController::class, 'getCourseLoadData']);

//For Testing

Route::post('/sample_student',[MarklistController::class, 'sample_student'])->name('sample_student');

Route::post('/sample_student',[MarklistController::class, 'sample_student'])->name('sample_student');

Route::get('addSemister',[SectionController::class, 'semister']);

Route::get('addSemisterI',[SectionController::class, 'insertSemister']);

Route::get('exportstudent/{class}/{stream}/{section}/{assasmnet}/{courseLoad}/{subject}', [ExcelController::class, 'export']);

Route::get('exportstudent/{class}/{stream}/{section}/{assasmnet}/{subject}', [ExcelController::class, 'multipleExport']);

Route::get('generateStudentCard', [MarklistController::class, 'generateTotalCard']);

// Student Traits

Route::get('addStudentTraits/{value}', [StudentPersonalDevelopmentController::class, 'addStudentTraits']);

// Schedule

Route::get('add_schedule', [ScheduleController::class, 'index']);

Route::get('getSection/{class}/{stream}', [ScheduleController::class, 'getSection']);

Route::get('addSchedule/{class}/{stream}/{subject}/{day}/{section}/{period}', [ScheduleController::class, 'addSchedule']);

Route::get('getSubjectGroup/{class}', [ScheduleController::class, 'getSubjectGroup']);

//mickey schedule experiment

Route::get('/indexNewSchedule', [ScheduleController::class, 'indexNewSchedule']);

Route::get('/generateNewSchedule', [ScheduleController::class, 'generateNewSchedule']);

Route::get('/getGeneratedSchedule', [ScheduleController::class, 'getGeneratedSchedule']);

Route::get('/getScheduleForSpecificeSection/{class_id}/{stream_id}/{section_name}', [ScheduleController::class, 'getScheduleForSpecificeSection']);


// Home Room

Route::get('getHomeRoomStream/{class}', [ListTeacherController::class, 'getHomeRoomStream']);

Route::get('getHomeRoomSection/{class}/{stream}', [ListTeacherController::class, 'getHomeRoomSection']);

// promote student
Route::get('promoteStudentToNextClass/{class}/{stream}/{section}/{teacher}', [ListTeacherController::class, 'promoteStudentToNextClass']);

// Assasment

Route::get('getAllAssasment', function () {
    return response()->json(assasment_type::all());
});

Route::get('pdf/generate/{path}', [ExcelController::class, 'create']);

Route::get('downloadSingleStudentId/{id}', [ExcelController::class, 'downloadSingleId']);

// Route::get('cd/{id}', function($id)
// {
//     // ->resize(323.527,204.01)
//     // $img = Image::make(storage_path('app/public/student_id_image/idcard.jpg'));
//     // $path = Storage::path('public/student_id_image/idcard.jpg');
//     // return response()->download($path, "student.png");
//     // $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
//     // file_put_contents(storage_path('app/public/student_id_image/barcode/barcode.jpg'), $generator->getBarcode('081231723897', $generator::TYPE_CODABAR));
//     // $barcode = $generator->getBarcode($id, $generator::TYPE_CODE_128);
//     // if (!extension_loaded('imagick')){
//     //     echo 'imagick not installed';
//     // }else
//         // return  QRCode::text('Laravel QR Code Generator!')->png();
//         return QRCode::text('John Doe ABraham')->setOutfile(storage_path('app/public/student_id_image/qrcode/qrcode.png'))->png();
//     // return storage_path('app/public/student_id_image/barcode/barcode.jpg');
// });


require __DIR__.'/auth.php';
