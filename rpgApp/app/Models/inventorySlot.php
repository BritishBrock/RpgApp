<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventorySlot extends Model
{
    use HasFactory;
    protected $table = 'inventory_slots';
    
    public $timestamps = false;
    
    protected $fillable = ['idInventory','slotNum'];
    
    public function inventory(){
        return $this->belongsTo('App\Models\Inventory','idInventory');
    }
}
