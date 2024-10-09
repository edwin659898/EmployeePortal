<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->middleware('auth');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/index', [App\Http\Controllers\EmployeeTemplateController::class, 'index'])->name('index');
    Route::post('/storeC', [App\Http\Controllers\EmployeeTemplateController::class, 'storeC'])->name('storeC');
    Route::put('/update/{id}', [App\Http\Controllers\EmployeeTemplateController::class, 'update'])->name('update');
    Route::put('/updateB/{id}', [App\Http\Controllers\EmployeeTemplateController::class, 'updateB'])->name('updateB');
    Route::put('/updateC/{id}', [App\Http\Controllers\EmployeeTemplateController::class, 'updateC'])->name('updateC');
    Route::post('/upload', [App\Http\Controllers\EmployeeTemplateController::class, 'upload'])->name('upload');
    //file
    Route::get('/View/{id}', [App\Http\Controllers\EmployeeTemplateController::class, 'file']);
    Route::get('/TrainingDoc/{id}', [App\Http\Controllers\EmployeeTemplateController::class, 'TrainingFile']);
    Route::get('AdminView/View/{id}', [App\Http\Controllers\EmployeeTemplateController::class, 'file']);

    Route::middleware(['Administrator'])->group(function () {
        Route::get('/Admin', [App\Http\Controllers\AdminController::class, 'index'])->name('Admin');
        Route::get('/Create-user', [App\Http\Controllers\AdminController::class, 'create'])->name('create.user');
        Route::post('/Create-user', [App\Http\Controllers\AdminController::class, 'storeUser'])->name('store.user');
        Route::delete('/destroy/user/{id}', [App\Http\Controllers\AdminController::class, 'destroyUser']);
        Route::get('/Employee-details/{id}', [App\Http\Controllers\AdminController::class, 'UserDetails'])->name('user.detail');
        Route::patch('/Update-status/{id}', [App\Http\Controllers\AdminController::class, 'UserStatus']);
        Route::post('/Personal-details/{id}', [App\Http\Controllers\AdminController::class, 'personalDetails']);
        Route::post('/Job-details/{id}', [App\Http\Controllers\AdminController::class, 'JobDetails']);
        Route::post('/Emergency-contact/{id}', [App\Http\Controllers\AdminController::class, 'EmergencyContact']);
        Route::post('/upload-documents/{id}', [App\Http\Controllers\AdminController::class, 'uploadDocs']);
      
        // Route::post('/ImagePrivate/{id}', [App\Http\Controllers\AdminController::class, 'ImagePrivate'])->name('Admin.view');
        // D:\laravel projects\EmployeeTemplate-main\app\Http\Controllers\adminimages.php

        Route::delete('/removeDoc/{id}', [App\Http\Controllers\AdminController::class, 'destroyDoc']);
        Route::post('/company-asset/{id}', [App\Http\Controllers\AdminController::class, 'CompanyAsset']);
        Route::delete('/remove-asset/{id}', [App\Http\Controllers\AdminController::class, 'destroyAsset']);
        Route::post('/training-record/{id}', [App\Http\Controllers\AdminController::class, 'TrainingRecord']);
        Route::delete('/remove-training/{id}', [App\Http\Controllers\AdminController::class, 'destroyTraining']);
        Route::get('/user-PDF/{id}', [App\Http\Controllers\AdminController::class, 'GeneratePDF']);

        Route::post('/ImagePrivate/{id}', [App\Http\Controllers\AdminController::class, 'ImagePrivate']);


        Route::get('/Selected-User', [App\Http\Controllers\EmployeeTemplateController::class, 'SelectedDept'])->name('select.dept');
        Route::get('/EmployeeView/{id}', [App\Http\Controllers\EmployeeTemplateController::class, 'Adminview'])->name('Admin.view');
        Route::get('/selectAll', [App\Http\Controllers\EmployeeTemplateController::class, 'selectall'])->name('select.all');
        Route::get('/Export/{employees}', [App\Http\Controllers\EmployeeTemplateController::class, 'export'])->name('employees.export');
    });
});

Route::post('/logout', function () {
    return Auth::logout();
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
