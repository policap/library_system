<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'username',
        'phone_number'
    ];
    protected $table='visitors';
    public function card(){
        return $this->hasOne(Card::class);
    }
    public function visitorbook(){
        return $this->belongsToMany(Book::class, VisitorBook::class);
    }
}

