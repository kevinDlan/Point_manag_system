<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'id_training',
        'firstName',
        'lastName',
        'birthday',
        'educationLevel',
        'branchOfStudy',
        'email',
        'address',
        'tel',
        'parentContact',
        ''
    ];
    use HasFactory;
}
