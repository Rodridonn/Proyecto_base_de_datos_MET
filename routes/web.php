<?php

use App\Http\Controllers\SpecialityController;
use App\Models\Speciality;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
              
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\ExcelServiceProvider;


Route::get('/', function(){
    return view('welcome');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);
/* Rutas de las especilalidades  */
Route::get('/especialidades', [App\Http\Controllers\SpecialityController::class, 'index']);
Route::get('/especialidades/create', [App\Http\Controllers\SpecialityController::class, 'create']);
Route::get('/especialidades/{speciality}/edit', [App\Http\Controllers\SpecialityController::class, 'edit']);
Route::post('/especialidades', [App\Http\Controllers\SpecialityController::class, 'sendData']);

Route::put('/especialidades/{speciality}', [App\Http\Controllers\SpecialityController::class, 'update']);
Route::delete('/especialidades/{speciality}', [App\Http\Controllers\SpecialityController::class, 'destroy']);
/* RUTAS MET-004 SLCB */
Route::get('/metslcb', [App\Http\Controllers\MetslcbController::class, 'index']);
Route::get('/metslcb/create', [App\Http\Controllers\MetslcbController::class, 'create']);
Route::get('/metslcb/{metslcb}/edit', [App\Http\Controllers\MetslcbController::class, 'edit']);
Route::post('/metslcb', [App\Http\Controllers\MetslcbController::class, 'sendData']);

Route::put('/metslcb/{metslcb}', [App\Http\Controllers\MetslcbController::class, 'update']);
Route::delete('/metslcb/{metslcb}', [App\Http\Controllers\MetslcbController::class, 'destroy']);
/* RUTAS MET-004 SLVR */
Route::get('/metslvr', [App\Http\Controllers\MetslvrController::class, 'index']);
Route::get('/metslvr/create', [App\Http\Controllers\MetslvrController::class, 'create']);
Route::get('/metslvr/{metslvr}/edit', [App\Http\Controllers\MetslvrController::class, 'edit']);
Route::post('/metslvr', [App\Http\Controllers\MetslvrController::class, 'sendData']);

Route::put('/metslvr/{metslvr}', [App\Http\Controllers\MetslvrController::class, 'update']);
Route::delete('/metslvr/{metslvr}', [App\Http\Controllers\MetslvrController::class, 'destroy']);

/* RUTAS DE LA PESTAÑA METAR */
Route::get('/metar',[App\Http\Controllers\MetarController::class, 'index']);
Route::get('/metar/create',[App\Http\Controllers\MetarController::class, 'create']);
Route::get('/metar/{metar}/edit',[App\Http\Controllers\MetarController::class, 'edit']);
Route::post('/metar',[App\Http\Controllers\MetarController::class, 'sendData']);

Route::put('/metar/{metar}',[App\Http\Controllers\MetarController::class, 'update']);
Route::delete('/metar/{metar}',[App\Http\Controllers\MetarController::class, 'destroy']);

/* busqueda avanzada */
Route::get('tblmetar', [App\Http\Controllers\MetarController::class, 'tabla']);


/* ruta para exportar a excel */ 
Route::get('/specialities/export', [App\Exports\SpecialitiesExport::class, 'exportExcel'])->name('specialities.export');

