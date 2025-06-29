<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Versenyzo extends Model{
    protected $table = "versenyzok";
    public function fordulo() {
        return $this->belongsTo(Fordulo::class,"forduloId","id");
    }
    public function felhasznalo() {
        return $this->belongsTo(Felhasznalo::class,"felhasznaloEmail","email");
    }
}
