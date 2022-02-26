<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    
     
    protected $table = 'inventories';
    
    public $timestamps = false;
    
    protected $fillable = ['character_id','inventory_slots_id'];
    
    public function character(){
        return $this->hasOne('App\Models\Character','idInventory');
    }
    public function inventorySlot(){
        return $this->hasMany('App\Models\inventorySlot','inventory_slots_id');
    }
    
}
