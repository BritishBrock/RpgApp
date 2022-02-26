<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abilities extends Model
{
    use HasFactory;
    
    protected $table = 'abilities';
    
    public $timestamps = false;
    
    protected $fillable = ['name','Class_abilites_id'];
    
    public function Character_attribute(){
          return $this->belongsTo('App\Models\Class_abilities','Class_abilites_id');
    }
}
