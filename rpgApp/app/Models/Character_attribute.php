<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character_attribute extends Model
{
    use HasFactory;
    
    
    protected $table = 'character_attributes';
    
    public $timestamps = false;
    
    protected $fillable = ['character_id','name','value'];
    
    
    
    public function character(){
          return $this->belongsTo('App\Models\Character','character_id');
    }
   
    
}
