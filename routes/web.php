<?php

use App\Http\Controllers\AuthorizeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use vendor\filament\filament\resources\views\pages;
use App\Http\Controllers\ChairpersonController;
use App\Http\Controllers\StudentBookController;
use App\Http\Controllers\StudentConcernController;
use App\Http\Controllers\StudentEvaluationController;
use App\Http\Controllers\StudentGradesController;
use App\Http\Controllers\StudentInboxController;
use App\Http\Controllers\StudentInformationController;
use App\Http\Controllers\StudentSchedulesController;
use App\Http\Controllers\StudentServicesController;

/*;
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/student-view/{id}',[SignUpController::class,'studentview']) -> name('student-view.get');
Route::post('/student-view/{id}',[SignUpController::class,'studentrequest']) -> name('student-view.post-request');

Route::post('/reset-password',[SignUpController::class,'resetpassword'] )->name('reset-password.post');
Route::get('/reset-password',[SignUpController::class,'getresetpassword'] )->name('reset-password.get');
Route::get('/faqs', function () {
    return view("faqs"); 
 })->name('faqs.get');
Route::get('/',[SignUpController::class,'get'])->name("sign-in.get");
Route::post('/',[SignUpController::class,'post']);
Route::get('/authorize', AuthorizeController::class)->name('authorize');
 
Route::get('/dashboard', function () {
    return view('dashboard'); 
 });
 
Route::get('/login', function () {
   abort(404); 
});

Route::get('/ams/view-information', function () {
    return view('view-information');
});

# for chairperson routes

Route::get('/cp-dashboard', [ChairpersonController::class, 'dashboard'])->name('cp-dashboard');
Route::get('/view-students', [ChairpersonController::class, 'viewStudents'])->name('view-students');
Route::get('/students', [ChairpersonController::class, 'viewStudents'])->name('view-students');
Route::get('/students/{student}', [ChairpersonController::class, 'viewStudent'])->name('view-student');
Route::get('/appeals', [ChairpersonController::class, 'viewAppeals'])->name('view-appeals');
Route::get('/professors', [ChairpersonController::class, 'viewProfessors'])->name('view-professors'); 
Route::post('/professors/create', [ChairpersonController::class, 'createProfessor'])->name('create-professor');
Route::get('/classes', [ChairpersonController::class, 'viewClasses'])->name('view-classes');
Route::post('/classes/{class}/update-professor', [ChairpersonController::class, 'updateClassProfessor'])->name('update-class-professor');
Route::post('/create-class', [ChairpersonController::class, 'createClass'])->name('create-class');
Route::get('/classes/{class}/edit', [ChairpersonController::class, 'editClass'])->name('edit-class');
Route::post('/classes/{class}/update', [ChairpersonController::class, 'updateClass'])->name('update-class');
Route::post('/save-remarks', [App\Http\Controllers\ChairpersonController::class, 'saveRemarks']);

Route::get('/student-concerns', function () { return view('Student.student-concerns'); });
Route::get('/student-evaluation',[StudentEvaluationController::class, 'get']);
Route::get('/student-grades', [StudentGradesController::class, 'get'])->name('student.grades');
Route::get('/student-inbox',[StudentInboxController::class, 'get']);
Route::get('/student-information',[StudentInformationController::class, 'get']);
Route::get('/student-schedules',[StudentSchedulesController::class, 'get']);
Route::get('/student-services',[StudentServicesController::class, 'get']);
Route::get('/student-ogts-appoinment',[StudentBookController::class, 'get']);
Route::post('/student-concerns/submit', [StudentConcernController::class, 'submit'])->name('student.concerns.submit');
Route::get('/student-concerns', [StudentConcernController::class, 'get'])->name('student.concerns.get');
Route::post('/fetch-emails', [StudentConcernController::class, 'fetchEmails'])->name('fetch.emails');




//logout chairperson
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});
