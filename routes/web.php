<?php

use App\Http\Controllers\AuthorizeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use vendor\filament\filament\resources\views\pages;
use App\Http\Controllers\ChairpersonController;

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

Route::middleware(['validlogin', 'preventBackHistory'])->group(function () {
    Route::get('/student-view/{id}',[SignUpController::class,'studentview']) -> name('student-view.get');
    Route::post('/student-view/{id}',[SignUpController::class,'studentrequest']) -> name('student-view.post-request');
});

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
Route::get('/assign-classes', [ChairpersonController::class, 'showAssignClassesForm'])->name('assign-classes.form');
Route::post('/assign-classes', [ChairpersonController::class, 'assignClasses'])->name('assign-classes.store');
Route::get('/send-email', [ChairpersonController::class, 'showSendEmailForm'])->name('send-email.form');
Route::post('/send-email', [ChairpersonController::class, 'sendEmail'])->name('send-email.store');


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
