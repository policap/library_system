<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorBook extends Model
{
    use HasFactory;

    protected $fillable=[

        'visitor_id',
        'book_id',
        'action',
        
    ];
    protected $table='visitors_books';
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }
}
