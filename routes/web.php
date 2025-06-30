<?php

use App\Models\Felhasznalo;
use App\Models\Fordulo;
use App\Models\Verseny;
use App\Models\Versenyzo;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('versenyek',['versenyek' => Verseny::all()]);
});
Route::post('/', function () {
    request()->validate([
        'name' => 'required|alpha|max:50',
        'year' => 'required|numeric|min:1990|max:9999',
        'languages' => 'required|regex:/^([^0-9]*)$/|max:100',
        'pointsForCorrect' => 'required|numeric',
        'pointsForIncorrect' => 'required|numeric',
        'pointsForEmpty'=> 'required|numeric',
    ]);
    if(count(explode(",",request('languages'))) > 1) {
        throw ValidationException::withMessages(['lang' => 'A nyelvek rosszul vannak szeparálva!']);
    } elseif (count(explode(";",request('languages'))) > 1){
        throw ValidationException::withMessages(['lang' => 'A nyelvek rosszul vannak szeparálva!']);
    } elseif (count(explode("|",request('languages'))) > 1){
        throw ValidationException::withMessages(['lang' => 'A nyelvek rosszul vannak szeparálva!']);
    } else {
        $found = Verseny::where('name', request('name'))->where('year', request('year'))->first();
        if(!$found){
            Verseny::create([
                'name'=> request('name'),
                'year'=> request('year'),
                'languages'=> request('languages'),
                'pointsForCorrect'=> request('pointsForCorrect'),
                'pointsForIncorrect'=> request('pointsForIncorrect'),
                'pointsForEmpty'=> request('pointsForEmpty'),
            ]);
            return redirect('/');
        } else {
            throw ValidationException::withMessages(['dupl' => 'Ilyen verseny már létezik!']);
        }
    }
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

    $found = Fordulo::where('roundNumber', $roundNumber)->where('versenyName', $name)->where('versenyYear', $year)->first();
    if(!$found){
        Fordulo::create([
        'id' => $id,
        'roundNumber' => $roundNumber,
        'versenyName' => $name,
        'versenyYear' => $year,
        ]);
        return redirect('/fordulok/'. $name .'/'. $year);
    } else {
        throw ValidationException::withMessages(['dupl' => 'Ilyen forduló már létezik!']);
    }
    
});
Route::get('/versenyzok/{id}', function ($id) {
    $fordulo = Fordulo::where('id', $id)->first();
    $emails = Versenyzo::where('forduloId', $id)->pluck('felhasznaloEmail')->toArray();
    $felhasznalok = Felhasznalo::all()->whereNotIn('email', $emails);
    return view('fordulo',['fordulo'=> $fordulo,'felhasznalok' => $felhasznalok]);
});
Route::post('/versenyzok/{id}', function ($id) {
    $email = request()->input('emails');
    $found = Versenyzo::where('felhasznaloEmail', $email)->where('forduloId', $id)->first();
    if(!$found){
        Versenyzo::create([
        'felhasznaloEmail' => $email,
        'forduloId' => $id,
        ]);
        return redirect('/versenyzok/'. $id);
    } else {
        throw ValidationException::withMessages(['dupl' => 'Ez a felhasználó már részese ennek a fordulónak!']);
    }
    
});
Route::get('/felhasznalok', function () {
    return view('felhasznalok',['felhasznalok' => Felhasznalo::all()]);
});
Route::get('/felhasznalok/create', function () {
    return view('felhasznalok-create');
});
Route::post('/felhasznalok', function () {
    request()->validate([
        'email' => 'required|email|max:50',
        'firstName' => 'required|alpha|max:30',
        'lastName' => 'required|alpha|max:30',
        'phone' => 'max:20',
        'address' => 'max:50',
    ]);

    $found = Felhasznalo::where('email', request()->input('email'))->first();
    
    if(!$found){
        Felhasznalo::create([
        'email'=> request('email'),
        'firstName'=> request('firstName'),
        'lastName'=> request('lastName'),
        'phone'=> request('phone'),
        'address'=> request('address'),
        ]);
        return redirect('/felhasznalok');
    } else {
        throw ValidationException::withMessages(['dupl' => 'Ilyen email című felhasználó már létezik!']);
    }
});
Route::get('/felhasznalok/{email}', function ($email) {
    $felhasznalo = Felhasznalo::where('email', $email)->first();
    return view('felhasznalo',['felhasznalo' => $felhasznalo]);
});

