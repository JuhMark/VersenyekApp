<?php 

namespace App\Models;

use Dotenv\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Felhasznalo extends Model{
    use HasFactory;
    protected $table = "felhasznalok";
    protected $fillable = ['email','firstName','lastName','phone','address'];
    public $timestamps = false;
}