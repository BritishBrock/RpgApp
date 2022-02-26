<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_abilities extends Model
{
    use HasFactory;
    protected $table = 'class_abilities';
    
    public $timestamps = false;
    
    protected $fillable = ['name','character_class_id','abilities_id'];
    
    public function character_class(){
        return $this->belongsTo('App\Models\Character_class','character_class_id');
    }
    public function abilities(){
        return $this->hasOne('App\Models\Abilities','Class_abilites_id');
    }
}
