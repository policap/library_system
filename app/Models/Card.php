<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'valid from',
        'valid till',
        'user_id',
        'visitor_id'
    ];

    public function owner(){
        return $this-> user_id!=NULL? $this->belongsTo(User::class) : $this->belongsTo(Visitor::class);
        
    }

}
