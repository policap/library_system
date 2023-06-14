<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student_Upload_InfoController;
class Student_upload_info extends Model
{
    use HasFactory;
    protected $fillable=['fname','lname','gender','pob','dob','program','level','img_name'];
    protected $table='student_upload_infos';
}