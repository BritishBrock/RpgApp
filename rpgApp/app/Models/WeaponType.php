<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponType extends Model
{
    use HasFactory;
      
    protected $table = 'weapon_types';
    
    public $timestamps = false;
    
    protected $fillable = ['type'];
    
   
}
