<?php

use App\Http\Controllers\Setting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TypeFormController;
use App\Http\Controllers\ApparatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

/** for side bar menu active */
function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------login ------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('change/password', 'changePassword')->name('change/password');
});

// ----------------------------- register -------------------------//
Route::controller(RegisterController::class)->group(function () {
    //Register Student
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');
     //Register Instructor
    Route::get('/insregister', 'insregister')->name('insregister');
    Route::post('/insregister','storeUser')->name('insregister');
    //Register Admin
    Route::get('/adminregister', 'adminregister')->name('adminregister');
    Route::post('/adminregister','storeUser')->name('adminregister');

});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
    Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
    Route::get('teacher/dashboard', 'teacherDashboardIndex')->middleware('auth')->name('teacher/dashboard');
    Route::get('student/dashboard', 'studentDashboardIndex')->middleware('auth')->name('student/dashboard');
});

// ----------------------------- user controller -------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('list/users', 'index')->middleware('auth')->name('list/users');
    Route::post('change/password', 'changePassword')->name('change/password');
    Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
    Route::post('user/update', 'userUpdate')->name('user/update');
    Route::post('user/delete', 'userDelete')->name('user/delete');
    Route::post('user/add', 'userAdd')->name('user/add');
    Route::get('view/user/add', 'addingUser')->middleware('auth');


});


// ------------------------ setting -------------------------------//
Route::controller(Setting::class)->group(function () {
    Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
});

// ------------------------ student -------------------------------//
Route::controller(StudentController::class)->group(function () {
    Route::get('student/list', 'student')->middleware('auth')->name('student/list');
    Route::get('student/grid', 'studentGrid')->middleware('auth')->name('student/grid');
    Route::get('student/add/page', 'studentAdd')->middleware('auth')->name('student/add/page');
    Route::post('student/add/save', 'studentSave')->name('student/add/save');
    Route::get('view/student/edit/{id}', 'studentView')->middleware('auth');
    Route::post('student/update', 'studentUpdate')->name('student/update');
    Route::post('student/delete', 'studentDelete')->name('student/delete');





});


//s ------------------------ apparatus -------------------------------//
Route::controller(ApparatusController::class)->group(function () {
    Route::get('apparatus/list', 'apparatus')->middleware('auth')->name('apparatus/list');
    Route::get('apparatus/add/page', 'apparatusAdd')->middleware('auth')->name('apparatus/add/page');
    Route::post('apparatus/add/save', 'apparatusSave')->name('apparatus/add/save');





});


// ------------------------ Dashboard -------------------------------//

Route::controller(DashboardController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');

});


