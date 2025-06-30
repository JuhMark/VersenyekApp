<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verseny extends Model{
    protected $table = "versenyek";
    protected $primary_key = ['name','year'];
    protected $fillable = ['name','year','languages','pointsForCorrect','pointsForIncorrect','pointsForEmpty'];
    public $timestamps = false;
    public function fordulok(){
        return Fordulo::all()->where('versenyName','=',$this->name)->where('versenyYear','=',$this->year)->sortBy('roundNumber');
    }
}