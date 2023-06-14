<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

    protected $fillable=[
        'address',
        'library_id'
    ];
    public function book(){
        return $this->hasMany(Book::class);
    }
    public function library(){
        return $this->belongsTo(Library::class);
    }
}
