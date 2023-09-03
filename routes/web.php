<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\forgotPasswordController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Department;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManagerController::class, 'login'])->name('login');
Route::post('/checkLogin', [AuthManagerController::class, 'checkLogin'])->name('checkLogin');
Route::get('/register', [AuthManagerController::class, 'register'])->name('register');
Route::post('/register', [AuthManagerController::class, 'registerPost'])->name('registerPost');
Route::get('/update-profile/{id}', [AuthManagerController::class, 'updateProfile'])->name('updateProfile');
Route::post('/register/{id}', [AuthManagerController::class, 'updateProfilePost'])->name('updateProfilePost');
Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');



Route::get('/employee/home', function () {
    $id = Auth::user()->id;
    $data = compact('id');
    return view('employee')->with($data);
})->name('employee.home');

Route::get('/company/dashboard', function () {
    $empCount = User::all()->count();
    $departmentCount = Department::all()->count();
    return view('dashboard')->with(compact('empCount', 'departmentCount'));
})->name('company.dashboard');

// Forgot password
Route::get('forgot-password', [forgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('forgot-password', [forgotPasswordController::class, 'forgotPasswordEmail'])->name('forgotPasswordEmail');
Route::get('reset-password/{token}', [forgotPasswordController::class, 'resetPassword'])->name('resetPassword');
Route::post('reset-password', [forgotPasswordController::class, 'resetPasswordPost'])->name('resetPasswordPost');

// department
Route::get('department/add', [DepartmentController::class, 'index'])->name('departments.add');
Route::post('department/store', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('department/view', [DepartmentController::class, 'view'])->name('departments.view');
Route::get('department/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::get('department/destroy/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
Route::post('department/update/{id}', [DepartmentController::class, 'update'])->name('departments.update');

// employee
Route::get('employee/view', [EmployeesController::class, 'index'])->name('employees.view');
Route::get('employee/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
Route::get('employee/trash', [EmployeesController::class, 'trash'])->name('employees.trash');
Route::get('employee/restore/{id}', [EmployeesController::class, 'restore'])->name('employees.restore');
Route::get('employee/destroy/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
Route::get('employee/forcedelete/{id}', [EmployeesController::class, 'forcedelete'])->name('employees.forcedelete');

// // github
// Route::get('/socialite/github', function () {
//     return Socialite::driver('github')->redirect();
// });
 
// Route::get('/socialite/redirect', function () {
//     $user = Socialite::driver('github')->user();
//     return view('/home');
// });

//Google
Route::get('/login/google', [AuthManagerController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [AuthManagerController::class, 'handleGoogleCallback']);
//Facebook
Route::get('/login/facebook', [AuthManagerController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [AuthManagerController::class, 'handleFacebookCallback']);
//Github
Route::get('/login/github', [AuthManagerController::class, 'redirectToGithub'])->name('login.github');
Route::get('/login/github/callback', [AuthManagerController::class, 'handleGithubCallback']);