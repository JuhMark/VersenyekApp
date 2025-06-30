<?php

namespace App\Http\Controllers;

use App\Models\Felhasznalo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FelhasznaloController
{
    public function index()
    {
        return view('felhasznalok',['felhasznalok' => Felhasznalo::all()]);
    }
    public function fetchSpecific($email)
    {
        $felhasznalo = Felhasznalo::where('email', $email)->first();
        return response()->json([
            'felhasznalo'=>$felhasznalo,
        ]);
    }
    public function fetchAll()
    {
        $felhasznalok = Felhasznalo::all();
        return response()->json([
            'felhasznalok'=>$felhasznalok,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:50',
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'phone' => 'phone',
            'address' => 'address',
        ]);

        if( $validator->fails() ){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else {
            $felhasznalo = new Felhasznalo;
            $felhasznalo->email = $request->input('email');
            $felhasznalo->firstName = $request->input('firstName');
            $felhasznalo->lastName = $request->input('lastName');
            $felhasznalo->phone = $request->input('phone');
            $felhasznalo->address = $request->input('address');
            $felhasznalo->save();
            return response()->json([
                'status'=>200,
                'message'=>'Felhasznalo sikeresen hozzáadva'
            ]);
        }
    }
    public function update(Request $request, $email)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:50',
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'phone' => 'phone',
            'address' => 'address',
        ]);

        if( $validator->fails() ){
            return response()->json([
                'status'=> 400,
                'errors'=>$validator->messages()
            ]);
        } else {
            $felhasznalo = Felhasznalo::where('email', $email)->first();
            if($felhasznalo){
                $felhasznalo->firstName = $request->input('firstName');
                $felhasznalo->lastName = $request->input('lastName');
                $felhasznalo->phone = $request->input('phone');
                $felhasznalo->address = $request->input('address');
                $felhasznalo->update();
                return response()->json([
                    'status'=> 200,
                    'message'=> 'Felhasználó sikeresen firssítve'
                ]);
            } else {
                return response()->json([
                'status'=> 404,
                'message'=> 'A keresett felhasználó nem létezik'
            ]);
            }
        }
    }

    public function destroy($email)
    {
        $felhasznalo = Felhasznalo::where('email', $email)->first();
        if( $felhasznalo) {
            $felhasznalo->delete();
            return response()->json([
                'status'=> 200,
                'message'=> 'Felhasználó sikeresen törölve'
            ]);
        } else {
            return response()->json([
                'status'=> 404,
                'message'=> 'A keresett felhasználó nem létezik'
            ]);
        }
    }
}
