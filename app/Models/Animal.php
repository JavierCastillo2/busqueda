<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'animals';

    protected $fillable = ['name','type','description','image'];
	
}
