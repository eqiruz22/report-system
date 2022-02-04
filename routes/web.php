<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExportReportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgresProjectController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusProjectController;
use App\Http\Controllers\TermOfPaymentController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('table/index');
Route::get('/table', [DashboardController::class, 'tableview'])->middleware('auth');
Route::get('/create-report', [DashboardController::class, 'create'])->middleware('auth');
Route::get('/report/{data:id}/edit', [DashboardController::class, 'edit'])->middleware('auth');
Route::get('/report/delete/{data:id}', [DashboardController::class, 'destroy'])->middleware('auth');
Route::get('/report/send', [DashboardController::class, 'reminderPrj'])->middleware('auth');
Route::post('/create-report/store', [DashboardController::class, 'store']);
Route::put('/report/update/{data:id}', [DashboardController::class, 'update']);

Route::get('/report-excel',[ExportReportController::class, 'ExportReport'])->middleware('auth');

Route::get('/status', [StatusController::class, 'index'])->middleware('auth');
Route::get('/status/create', [StatusController::class, 'create'])->middleware('auth');
Route::get('/status/delete/{id}', [StatusController::class, 'destroy'])->middleware('auth');
Route::post('/status/store', [StatusController::class, 'store']);

Route::get('/title', [TitleController::class, 'index'])->middleware('auth');
Route::get('/title/create', [TitleController::class, 'create'])->middleware('auth');
Route::get('/title/delete/{id}', [TitleController::class, 'destroy'])->middleware('auth');
Route::post('/title/store', [TitleController::class, 'store']);

Route::get('/status-project',[StatusProjectController::class, 'index'])->middleware('auth');
Route::get('/status-project/create', [StatusProjectController::class, 'create'])->middleware('auth');
Route::get('/status-project/edit/{data:id}', [StatusProjectController::class, 'edit'])->middleware('auth');
Route::get('/status-project/delete/{id}', [StatusProjectController::class, 'destroy'])->middleware('auth');
Route::post('/status-project/store', [StatusProjectController::class, 'store']);
Route::put('/status-project/update/{data:id}', [StatusProjectController::class, 'update']);

Route::get('/progres-project', [ProgresProjectController::class, 'index'])->middleware('auth');
Route::get('/progres-project/create', [ProgresProjectController::class, 'create'])->middleware('auth');
Route::get('/progres-project/edit/{id}', [ProgresProjectController::class, 'edit'])->middleware('auth');
Route::get('/progres-project/delete/{data:id}', [ProgresProjectController::class, 'destroy'])->middleware('auth');
Route::post('/progres-project/store', [ProgresProjectController::class, 'store']);
Route::put('/progres-project/update/{data:id}', [ProgresProjectController::class, 'update']);

Route::get('/term-of-payment', [TermOfPaymentController::class, 'index'])->middleware('auth');
Route::get('/term-of-payment/create',[TermOfPaymentController::class, 'create'])->middleware('auth');
Route::get('/term-of-payment/edit/{id}',[TermOfPaymentController::class, 'edit'])->middleware('auth');
Route::get('/term-of-payment/delete/{id}',[TermOfPaymentController::class, 'destroy'])->middleware('auth');
Route::post('/term-of-payment/store',[TermOfPaymentController::class, 'store']);
Route::put('/term-of-payment/update/{id}',[TermOfPaymentController::class, 'update']);

Route::get('/remark', [RemarkController::class, 'index'])->middleware('auth');
Route::get('/remark/create',[RemarkController::class, 'create'])->middleware('auth');
Route::get('/remark/edit/{id}',[RemarkController::class, 'edit'])->middleware('auth');
Route::get('/remark/delete/{id}',[RemarkController::class, 'destroy'])->middleware('auth');
Route::post('/remark/store',[RemarkController::class, 'store']);
Route::put('/remark/update/{id}',[RemarkController::class, 'update']);

Route::get('/user',[UserController::class, 'index'])->middleware('isAdmin');
Route::get('/user/create',[UserController::class, 'create'])->middleware('isAdmin');
Route::get('/user/edit/{id}',[UserController::class, 'edit'])->middleware('isAdmin');
Route::get('/user/delete/{id}',[UserController::class, 'destroy'])->middleware('isAdmin');
Route::get('/user/edit-password/{id}',[UserController::class, 'editPassword'])->middleware('isAdmin');
Route::put('/user/update-password/{id}',[UserController::class, 'updatePassword']);
Route::put('/user/update/{data:id}',[UserController::class, 'update']);
Route::post('/user/store',[UserController::class, 'store']);

Route::get('/document',[DocumentController::class, 'index'])->middleware('auth');
Route::post('/document/upload', [DocumentController::class, 'store']);
Route::get('/document/edit/{id}', [DocumentController::class, 'edit'])->middleware('auth');
Route::put('/document/update/{id}', [DocumentController::class, 'update']);
Route::get('/document/delete/{data:id}', [DocumentController::class, 'destroy'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);