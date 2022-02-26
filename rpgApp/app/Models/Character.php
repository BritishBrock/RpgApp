<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Character extends Model
{
    use HasFactory;
    use softDeletes;
    
    
    protected $table = 'characters';
    
    public $timestamps = false;
    
    protected $fillable = ['user_id','name','gold','xp','xpCap','level','character_class_id'];

    public function user(){
          return $this->belongsTo('App\Models\User','user_id');
    }
    public function character_attribute(){
          return $this->hasMany('App\Models\Character_attribute','character_attribute_id');
    }
    public function character_class(){
          return $this->belongsTo('App\Models\Character_class','character_class_id');
    }
    public function inventory(){
        return $this->hasOne('App\Models\Inventory','character_id');
    }
  
}
