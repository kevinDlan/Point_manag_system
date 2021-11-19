<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Training extends Model
{

    protected $fillable = [
        'id_partner',
        'id_referential',
        'label',
        'beginDate',
        'endDate'
    ];
    use HasFactory;
}
