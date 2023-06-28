<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable=[
        'organization_id',
        'name',
        'website',
        'country',
        'description',
        'founded',
        'industry',
        'number_of_employees'
    ];
}
