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
use App\Http\Controllers\CreditNoteHistoryController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\HomeController;
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

//one login
Route::post('onelogin/{id}',[ApiUserController::class,'login'])->middleware(EnsureTokenIsValid::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/chart',[HomeController::class,'monthly_creditnote_count']);

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
Route::get('/approve_email/{id}',[EmailController::class,'approve_email']);
Route::get('/reject_email/{id}',[EmailController::class,'reject_email']);


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
Route::put('/history/{id}',[HistoryController::class,'update']);
Route::get('/history/{id}',[HistoryController::class,'show']);
Route::delete('/history/{id}',[HistoryController::class,'destroy']);
Route::post('/history/assign_user_change',[HistoryController::class,'assign_user_change']);

Route::get('/futher_explanation',[FutherExplanationController::class,'index']);
Route::get('/futher_explanation/create',[FutherExplanationController::class,'create']);
Route::get('/futher_explanation/{id}',[FutherExplanationController::class,'show']);

Route::get('/credit_note_history',[CreditNoteHistoryController::class,'index']);
Route::get('/credit_note_history/create',[CreditNoteHistoryController::class,'create']);
Route::get('/credit_note_history/description/{id}',[CreditNoteHistoryController::class,'assign_description']);
