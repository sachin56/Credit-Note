<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplainmanagmentController;
use App\Http\Controllers\CreditnoteController;
use App\Http\Controllers\CreditnoteAttachmentController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\C_note_reportController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\FutherExplanationController;
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

//complain managment
Route::get('/complain',[ComplainmanagmentController::class,'index']);
Route::get('/complain/esm',[ComplainmanagmentController::class,'esm_complain']);
Route::post('/complain',[ComplainmanagmentController::class,'store']);



//credit note
Route::get('/credit_note',[CreditnoteController::class,'index']);
Route::get('/credit_note/create',[CreditnoteController::class,'create']);
Route::post('/credit_note',[CreditnoteController::class,'store']);
Route::post('/credit_note/update',[CreditnoteController::class,'update']);
Route::get('/credit_note/{id}',[CreditnoteController::class,'show']);
Route::get('/credit_note/description/{id}',[CreditnoteController::class,'assign_description']);
Route::get('/credit_note/assignuser/{id}',[CreditnoteController::class,'assign_user']); 
Route::get('/credit_note/approve/{id}',[CreditnoteController::class,'approve']); 
Route::get('/credit_note/reject/{id}',[CreditnoteController::class,'reject']); 
Route::post('/credit_note/futher_explanantion',[CreditnoteController::class,'futher_explanantion']);
Route::post('/credit_note/user_futher_explanantion',[CreditnoteController::class,'user_futher_explanantion']);

//Credit Note Attachment
Route::post('/creditnote_attachment',[CreditnoteAttachmentController::class,'store']);
Route::get('/creditnote_attachment/{id}',[CreditnoteAttachmentController::class,'create']);

//email
Route::get('/email/{id}',[EmailController::class,'sendmail']);


//user
Route::get('/user',[UserController::class,'index']);
Route::get('/user/create',[UserController::class,'create']);
Route::get('/user/{id}',[UserController::class,'show']);
Route::put('/user/{id}',[UserController::class,'update']);
Route::delete('/user/{id}',[UserController::class,'destroy']);


Route::get('/role',[RolesController::class,'index']);
Route::get('/role/create',[RolesController::class,'create']);
Route::post('/role',[RolesController::class,'store']);
Route::get('/role/{id}',[RolesController::class,'show']);
Route::put('/role/{id}',[RolesController::class,'update']);
Route::delete('/role/{id}',[RolesController::class,'destroy']);

Route::get('/credit_note_report',[C_note_reportController::class,'index']);
Route::get('/credit_note_report/{id}',[C_note_reportController::class,'export']);

Route::get('/history',[HistoryController::class,'index']);
Route::get('/history/create',[HistoryController::class,'create']);
Route::delete('/history/{id}',[HistoryController::class,'destroy']);

Route::get('/futher_explanation',[FutherExplanationController::class,'index']);
Route::get('/futher_explanation/create',[FutherExplanationController::class,'create']);
