<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jongeren extends Model
{
    use HasFactory;

    protected $table = 'jongeren';

    protected $fillable = [
        'voornaam',
        'tussenvoegsel',
        'achternaam',
    ];

}
