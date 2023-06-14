<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable=[
        'address',
        'code',
        'name',
        'library_id'
    ];
    public function library(){
        return $this->belongsTo(Library::class);
    }
}
