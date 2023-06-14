<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=['title','author','size','shelf_id','date'];

    public function books(){
        return $this->belongsTo(Shelf::class);
    }
    public function visitors_books($visitor_id=NULL){
        return $this->hasMany(VisitorBook::class)->where(function($q)use($visitor_id){
            $visitor_id==NULL ? NULL: $q->where('visitor_id', $visitor_id);
        });
        
    }
    public function visitors(){
        return $this->belongsToMany(Visitors::class,VisitorBook::class);
    }
}
