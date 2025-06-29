<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fordulo extends Model{
    protected $table = "fordulok";
    public function versenyzok(){
        return Versenyzo::all()->where('forduloId','=',$this->id);
    }
}