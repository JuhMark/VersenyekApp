<?php

use App\Models\Felhasznalo;
use App\Models\Fordulo;
use App\Models\Verseny;
use App\Models\Versenyzo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('versenyek',['versenyek' => Verseny::all()]);
});
Route::post('/', function () {
    Verseny::create([
        'name'=> request('name'),
        'year'=> request('year'),
        'languages'=> request('languages'),
        'pointsForCorrect'=> request('pointsForCorrect'),
        'pointsForIncorrect'=> request('pointsForIncorrect'),
        'pointsForEmpty'=> request('pointsForEmpty'),
    ]);
    return redirect('/');
});
Route::get('/versenyek/create', function () {
    return view('versenyek-create');
});
Route::get('/fordulok/{name}/{year}', function ($name, $year) {
    $verseny = Verseny::where('name', $name)->where('year', $year)->first();
    return view('verseny',['verseny' => $verseny]);
});
Route::post('/fordulok/{name}/{year}',function ($name,$year) {
    $roundNumber = Fordulo::where('versenyName', $name)->where('versenyYear', $year)->max('roundNumber');
    $roundNumber = $roundNumber ? $roundNumber+1 : 1;
    $id = Fordulo::max('id') + 1;
    Fordulo::create([
        'id' => $id,
        'roundNumber' => $roundNumber,
        'versenyName' => $name,
        'versenyYear' => $year,
    ]);
    return redirect('/fordulok/'. $name .'/'. $year);
});
Route::get('/versenyzok/{id}', function ($id) {
    $fordulo = Fordulo::where('id', $id)->first();
    return view('fordulo',['fordulo'=> $fordulo,'felhasznalok' => Felhasznalo::all()]);
});
Route::post('/versenyzok/{id}', function ($id) {
    $email = request()->input('emails');
    Versenyzo::create([
        'felhasznaloEmail' => $email,
        'forduloId' => $id,
    ]);
    return redirect('/versenyzok/'. $id);
});
Route::get('/felhasznalok', function () {
    return view('felhasznalok',['felhasznalok' => Felhasznalo::all()]);
});
Route::get('/felhasznalok/create', function () {
    return view('felhasznalok-create');
});
Route::post('/felhasznalok', function () {
    Felhasznalo::create([
        'email'=> request('email'),
        'firstName'=> request('firstName'),
        'lastName'=> request('lastName'),
        'phone'=> request('phone'),
        'address'=> request('address'),
    ]);
    return redirect('/felhasznalok');
});
Route::get('/felhasznalok/{email}', function ($email) {
    $felhasznalo = Felhasznalo::where('email', $email)->first();
    return view('felhasznalo',['felhasznalo' => $felhasznalo]);
});

