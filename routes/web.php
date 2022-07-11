<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorksAndExperiencesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Models\Visitors;
use App\Models\WorksAndExperiences;
use Illuminate\Support\Facades\DB;

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
    Visitors::create([
        'ip_address' => request()->ip()
    ]);
    $about_me = DB::table('about_mes')
        ->get();
    $certifications = DB::table('certifications')
        ->get();
    $works_and_experiences = DB::table('works_and_experiences')
        ->get();
    return view('welcome', [
        'about_me' => $about_me,
        'certifications' => $certifications,
        'works_and_experiences' => $works_and_experiences,
    ]);
});

Route::get('/project', [ProjectController::class, 'welcomeProjects'])->name('welcome.projects');


// Auth::routes();
Route::get('/admin-panel', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('loginSubmit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/checkcreds', [LoginController::class, 'checkCreds']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/editaboutme', [AboutMeController::class, 'index'])->name('admin.editaboutme');
Route::post('/editaboutme', [AboutMeController::class, 'editParagraphs'])->name('admin.submiteditaboutme');

Route::get('/certifications', [CertificationController::class, 'index'])->name('admin.certification');
Route::post('/addcertification', [CertificationController::class, 'addCertification']);
Route::post('/editcertification', [CertificationController::class, 'editCertification']);
Route::post('/deletecertification', [CertificationController::class, 'deleteCertification']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/addproject', [ProjectController::class, 'addProject']);
Route::post('/deleteproject', [ProjectController::class, 'deleteProject']);
Route::post('/editproject', [ProjectController::class, 'editProject']);

Route::get('/worksandexperiences', [WorksAndExperiencesController::class, 'index']);
Route::post('/addworksandexperiences', [WorksAndExperiencesController::class, 'addWorksAndExperiences']);
Route::post('/editworksandexperiences', [WorksAndExperiencesController::class, 'editWorksAndExperiences']);
Route::post('/deleteworksandexperiences', [WorksAndExperiencesController::class, 'deleteWorksAndExperiences']);

Route::get('/admins', [AdminController::class, 'index']);
Route::post('/addadmin', [AdminController::class, 'addAdmin']);
Route::post('/editadmin', [AdminController::class, 'editAdmin']);
Route::post('/deleteadmin', [AdminController::class, 'deleteAdmin']);

Route::post('/addemailsent', [EmailController::class, 'addEmailSent']);
