<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/patient/dashboard', [App\Http\Controllers\PatientController::class, 'index'])->name('patient.home');
Route::get('/apointment/departement', [App\Http\Controllers\PatientController::class, 'departement']);
Route::get('/apointment/doctors', [App\Http\Controllers\PatientController::class, 'doctors']);
Route::post('/apointment/add', [App\Http\Controllers\PatientController::class, 'addApointment']);
Route::get('/patient/profil/update', [App\Http\Controllers\PatientController::class, 'updateprofil']);
Route::post('/patient/update/profil', [App\Http\Controllers\PatientController::class, 'updateprofilpicture']);


Route::get('/medecine/dashboard', [App\Http\Controllers\MedecineController::class, 'index'])->name('medecine.home');
Route::get('/medecine/rendez-vous', [App\Http\Controllers\MedecineController::class, 'apointment'])->name('medecine.rendez');
Route::get('/medecine/historique', [App\Http\Controllers\MedecineController::class, 'historic'])->name('medecine.historic');
Route::get('/medecine/patients', [App\Http\Controllers\MedecineController::class, 'patient'])->name('medecine.patient');
Route::get('/medecine/calendrier', [App\Http\Controllers\MedecineController::class, 'calendar'])->name('medecine.calendar');
Route::get('/parametre', [App\Http\Controllers\SettingController::class, 'index'])->name('medecine.tarif');
Route::get('/setting/premium', [App\Http\Controllers\SettingController::class, 'payed']);
Route::get('/medecine/active/apointment/{type}/{id}', [App\Http\Controllers\MedecineController::class, 'actionapointment']);



Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/entreprise', [App\Http\Controllers\AdminController::class, 'entreprise'])->name('admin.entreprise');
Route::get('/admin/service', [App\Http\Controllers\AdminController::class, 'service'])->name('admin.service');
Route::get('/admin/medecine', [App\Http\Controllers\AdminController::class, 'medecine'])->name('admin.medecine');
Route::get('/admin/patient', [App\Http\Controllers\AdminController::class, 'patient'])->name('admin.patient');
Route::get('/admin/payment', [App\Http\Controllers\AdminController::class, 'payment'])->name('admin.payment');

Route::get('/admin/service/action/{type}/{id}', [App\Http\Controllers\AdminController::class, 'serviceAction']);
Route::get('/admin/entreprise/action/{type}/{id}', [App\Http\Controllers\AdminController::class, 'entrepriseAction']);
Route::post('/service/add', [App\Http\Controllers\AdminController::class, 'addservice']);
Route::get('/entreprise/add', [App\Http\Controllers\AdminController::class, 'addentreprise']);


Route::get('/mon-compte', [App\Http\Controllers\AdminController::class, 'account'])->name('account');
Route::post('/update/profil', [App\Http\Controllers\AdminController::class, 'accountupdate'])->name('update.profil');
Route::post('/admin/update/profil', [App\Http\Controllers\AdminController::class, 'updateUserProfil']);
