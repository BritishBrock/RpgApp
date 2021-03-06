<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
     protected $table = 'items';
    
    public $timestamps = false;
    
    protected $fillable = ['name'];
    
    public function itemType(){
       return $this->belongsTo('App\Models\ItemType','itemId');
    }
}
