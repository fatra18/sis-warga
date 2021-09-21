<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BornController;
use App\Http\Controllers\ComerController;
use App\Http\Controllers\DieController;
use App\Http\Controllers\FamilyCardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\UserControlller;
use App\Models\Move;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth'])->group(function () {
    Route::get('home',[AuthController::class,'home'])->name('dashboard');
    
    Route::get('resident',[ResidentController::class,'index'])->name('resident');
    Route::get('penduduk/exportpegawai',[ResidentController::class,'residentexport'])->name('penduduk-export');
    Route::post('resident/importpegawai',[ResidentController::class,'residentimportexcel'])->name('penduduk-import');
    Route::get('penduduk/create',[ResidentController::class,'create'])->name('residents-create');
    Route::post('resident/store',[ResidentController::class,'store'])->name('resident-store');
    Route::get('resident/edit/{id}',[ResidentController::class,'edit'])->name('resident-edit');
    Route::put('resident/edit/{id}',[ResidentController::class,'update'])->name('resident-update');
    Route::delete('resident/delete/{id}',[ResidentController::class,'destroy'])->name('resident-delete');
    Route::get('resident/filter',[ResidentController::class,'filterreset'])->name('resident-reset');
    Route::get('penduduk/template',[ResidentController::class,'template'])->name('penduduk-template');

    Route::get('family-card',[FamilyCardController::class,'index'])->name('family-card');
    Route::get('family-card/create',[FamilyCardController::class,'create'])->name('family-card-create');
    Route::post('family-card/store',[FamilyCardController::class,'store'])->name('family-card-store');
    Route::get('family-card/edit/{id}/{resident}',[FamilyCardController::class,'edit'])->name('family-card-edit');
    Route::put('family-card/edit/{id}',[FamilyCardController::class,'update'])->name('family-card-update');
    Route::get('family-card/detail',[FamilyCardController::class,'show'])->name('family-detail');
    Route::delete('family-card/{id}',[FamilyCardController::class,'destroy'])->name('family-delete');
    Route::get('family/exportpegawai',[FamilyCardController::class,'familyexport'])->name('family-export');
    Route::post('family/importpegawai',[FamilyCardController::class,'familyimportexcel'])->name('family-import');
    Route::get('family/filter',[FamilyCardController::class,'filterreset'])->name('family-reset');
    Route::get('family/template',[FamilyCardController::class,'template'])->name('family-template');

    
    Route::get('member-card/{id?}',[MemberController::class,'index'])->name('member-card');
    Route::get('member/create/{id}',[MemberController::class,'create'])->name('member-create');
    Route::post('member/store',[MemberController::class,'store'])->name('member-store');
    Route::get('member/edit',[MemberController::class,'edit'])->name('member-edit');
    Route::delete('member/delete/{id}',[MemberController::class,'destroy'])->name('member-delete');
    Route::get('member/detail',[MemberController::class,'show'])->name('member-detail');
    
    Route::get('move',[MoveController::class,'index'])->name('move');
    Route::get('move/create',[MoveController::class,'create'])->name('move-create');
    Route::post('move/create',[MoveController::class,'store'])->name('move-store');
    Route::get('move/edit/{id}',[MoveController::class,'edit'])->name('move-edit');
    Route::put('move/edit/{id}',[MoveController::class,'update'])->name('move-update');
    Route::delete('move/{id}',[MoveController::class,'destroy'])->name('move-delete');
    Route::get('move/exportpegawai',[MoveController::class,'moveexport'])->name('move-export');
    Route::post('move/importpegawai',[MoveController::class,'moveimportexcel'])->name('move-import');
    Route::get('move/filter',[MoveController::class,'filterreset'])->name('move-reset');
    Route::get('move/template',[MoveController::class,'template'])->name('move-template');



    Route::get('cormer',[ComerController::class,'index'])->name('cormer');
    Route::get('cormer/create',[ComerController::class,'create'])->name('cormer-create');
    Route::post('cormer/create',[ComerController::class,'store'])->name('cormer-store');
    Route::get('cormer/edit/{id}',[ComerController::class,'edit'])->name('cormer-edit');
    Route::put('cormer/edit/{id}',[ComerController::class,'update'])->name('cormer-update');
    Route::delete('cormer/edit/{id}',[ComerController::class,'destroy'])->name('cormer-delete');
    Route::get('cormer/exportpegawai',[ComerController::class,'cormerexport'])->name('cormer-export');
    Route::post('cormer/importpegawai',[ComerController::class,'cormerimportexcel'])->name('cormer-import');
    Route::get('cormer/filter',[ComerController::class,'filterreset'])->name('cormer-reset');
    Route::get('cormer/template',[ComerController::class,'template'])->name('cormer-template');



    Route::get('born',[BornController::class,'index'])->name('born');
    Route::get('born/create',[BornController::class,'create'])->name('born-create');
    Route::post('born/store',[BornController::class,'store'])->name('born-store');
    Route::get('born/edit/{id}/{family_id?}',[BornController::class,'edit'])->name('born-edit');
    Route::put('born/edit/{id}',[BornController::class,'update'])->name('born-update');
    Route::delete('born/edit/{id}',[BornController::class,'destroy'])->name('born-delete');
    Route::get('born/exportpegawai',[BornController::class,'bornexport'])->name('born-export');
    Route::post('born/importpegawai',[BornController::class,'bornimportexcel'])->name('born-import');
    Route::get('born/filter',[BornController::class,'filterreset'])->name('born-reset');
    Route::get('born/template',[BornController::class,'template'])->name('born-template');




    Route::get('die',[DieController::class,'index'])->name('death');
    Route::get('die/create',[DieController::class,'create'])->name('death-create');
    Route::post('die/create',[DieController::class,'store'])->name('death-store');
    Route::get('die/edit/{id}/{resident_id}',[DieController::class,'edit'])->name('death-edit');
    Route::put('die/edit/{id}',[DieController::class,'update'])->name('death-update');
    Route::delete('die/edit/{id}',[DieController::class,'destroy'])->name('death-delete');
    Route::get('death/exportpegawai',[DieController::class,'deathexport'])->name('death-export');
    Route::post('death/importpegawai',[DieController::class,'deathimportexcel'])->name('death-import');
    Route::get('death/template',[DieController::class,'template'])->name('death-template');

    
    Route::get('user',[UserControlller::class,'index'])->name('user');
    Route::get('user/create',[UserControlller::class,'create'])->name('user-create');
    Route::post('user/store',[UserControlller::class,'store'])->name('user-store');
    Route::get('user/edit/{id}',[UserControlller::class,'edit'])->name('user-edit');
    Route::put('user/edit/{id}',[UserControlller::class,'update'])->name('user-update');
    Route::delete('user/edit/{id}',[UserControlller::class,'destroy'])->name('user-delete');
    Route::get('user/exportpegawai',[UserControlller::class,'userexport'])->name('user-export');
    Route::post('user/importpegawai',[UserControlller::class,'userimportexcel'])->name('user-import');
    Route::get('user/template',[UserControlller::class,'template'])->name('user-template');

   
    
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function(){
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('/authenticate',[AuthController::class,'authenticate'])->name('auth');

});

