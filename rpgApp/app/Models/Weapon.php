<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;
     protected $table = 'weapons';
    
    public $timestamps = false;
    
    protected $fillable = ['name','damage'];
    
    public function weaponType(){
       return $this->belongsTo('App\Models\WeaponType','weaponId');
    }
}
