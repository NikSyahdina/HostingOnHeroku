<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FullCalenderController;
use App\Models\Appoint;
use App\Models\Article;
use App\Models\Appointment;


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


Route::get('/', [PageController::class, 'index']);



Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin-auth']], function () {
        Route::get('/', [HomeController::class, 'Adminindex']);
        Route::get('/counsellors/fetch', [HomeController::class, 'displayCounsellors']);
        Route::get('/counsellors', [HomeController::class, 'renderCounsellorsPage']);
        Route::get('/users', [HomeController::class, 'renderUsersPage']);
        Route::get('/users/fetch', [HomeController::class, 'displayUsers']);
        Route::get('/counsellor/edit/{id}', [HomeController::class, 'editCounsellor']);
        Route::get('/user/edit/{id}', [HomeController::class, 'editCounsellor']);
        Route::get('/user/view/{id}', [HomeController::class, 'viewUser']);
        Route::post('/counsellor/update', [HomeController::class,'updateCounsellors']);
        Route::post('/counsellor/delete/{id}', [HomeController::class, 'deleteCounsellor']);
        Route::post('/user/delete/{id}', [HomeController::class, 'deleteCounsellor']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/myappoinment',[HomeController::class,'myappoinment']);

Route::get('fullcalender', [FullCalenderController::class, 'index'])->name('fullcalender');
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

Route::post('/appoinment',[HomeController::class,'appoinment']);

Route::get('/appoint',function(){
    return view('appoint');
});

Route::post('/appoint',function(){
    $appoint = new Appoint();
    $appoint->name = request('name');
    $appoint->counsellor = request('counsellor');
    $appoint->session = request('session');
    $appoint->date = request('date');
    $appoint->time = request('time');
    $appoint->status='In progress';
    $appoint->action;

    if(Auth::id())
    {
        $appoint->userid=Auth::user()->id;
    }

    $appoint->save();

    return redirect('/appoint');

});



Route::get('/create',function(){
    return view('create');
});


Route::post('/create',function(){
    $article = new Article();
    $article->title=request('title');
    $article->body=request('body');
    $article->save();
    return redirect('/create');
    return view('/create');
});
Route::get('/approved/{id}',[HomeController::class,'approved']);
Route::get('/cancelled/{id}',[HomeController::class,'cancelled']);
Route::get('/appointment',function(){
    return view('appointment');
});
Route::get('/showappointment',[HomeController::class,'showappointment']);

Route::get('/faq',[HomeController::class,'faq']);

Route::post('/appointment',function(){
    $appointment = new Appointment();
    $appointment->counsellor = request('counsellor');
    $appointment->session = request('session');
    $appointment->date = request('date');
    $appointment->time = request('time');
    $appointment->save();

});






