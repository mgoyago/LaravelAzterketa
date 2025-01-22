<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekitaldiak extends Model
{
    /** @use HasFactory<\Database\Factories\EkitaldiakFactory> */
    use HasFactory;

    protected $fillable = ['name', 'data', 'azalpena'];
}
