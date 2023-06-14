<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'address',
        'contact'
    ];
    public function shelves(){
        return $this->hasMany(Shelf::class);
        
    }
    public function tables(){
        return $this->hasMany(Table::class);
        
    }
    public function users(){
        return $this->hasMany(User::class);
        
    }
    
}


