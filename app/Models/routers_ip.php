<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routers_ip extends Model
{
    use HasFactory;
    protected $fillable = [
        'public_address',
        'region',
        'country',
    ];
}
