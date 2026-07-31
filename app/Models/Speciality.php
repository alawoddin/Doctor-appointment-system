<?php

namespace App\Models;

use Database\Factories\SpecialityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    /** @use HasFactory<SpecialityFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];
}
