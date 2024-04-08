<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use vendor\filament\filament\resources\views\pages;

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

Route::get('/',[SignUpController::class,'get'])->name("sign-in.get");
Route::post('/',[SignUpController::class,'post']);
Route::get('/student-view/{id}',[SignUpController::class,'studentview']) -> name('student-view.get');
Route::post('/student-view/{id}',[SignUpController::class,'studentrequest']) -> name('student-view.post-request');


 Route::get('/dashboard', function () {
    return view('dashboard'); 
 });
 
Route::get('/login', function () {
   abort(404); 
});

Route::get('/ams/view-information', function () {
    return view('view-information');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});
