<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];
}
