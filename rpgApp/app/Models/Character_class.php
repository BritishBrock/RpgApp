<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character_class extends Model
{
    use HasFactory;
     
    protected $table = 'character_classes';
    
    public $timestamps = false;
    
    protected $fillable = ['name','character_id'];
    
   public function Character_attribute(){
          return $this->belongsTo('App\Models\Character','character_id');
    }
   
}
