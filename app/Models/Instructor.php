<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'id_training',
        'firstName',
        'lastName',
        'birthday',
        'email',
        'address',
        'tel',
    ];
}
