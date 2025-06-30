<?php

use App\Http\Controllers\FelhasznaloController;
use App\Models\Felhasznalo;
use App\Models\Fordulo;
use App\Models\Verseny;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('versenyek',['versenyek' => Verseny::all()]);
});
Route::get('/fordulok/{name}/{year}', function ($name, $year) {
    $verseny = Verseny::where('name', $name)->where('year', $year)->first();
    return view('verseny',['verseny' => $verseny]);
});
Route::get('/versenyzok/{id}', function ($id) {
    $fordulo = Fordulo::where('id', $id)->first();
    return view('fordulo',['fordulo'=> $fordulo]);
});
Route::get('/felhasznalok', [FelhasznaloController::class,'index']);
Route::post('felhasznalok',[FelhasznaloController::class,'store']);
Route::get('fetch-felhasznalok', [FelhasznaloController::class, 'fetchAll']);
Route::put('felhasznalo-frissit/{email}', [FelhasznaloController::class, 'update']);
Route::delete('felhasznalo-torol/{email}', [FelhasznaloController::class, 'destroy']);
Route::get('/felhasznalok/{email}', function ($email) {
    $felhasznalo = Felhasznalo::where('email', $email)->first();
    return view('felhasznalo',['felhasznalo' => $felhasznalo]);});

