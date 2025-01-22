<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekitaldiak extends Model
{
    use HasFactory;

    protected $table = 'ekitaldiaks';

    protected $fillable = ['izena', 'data', 'azalpena'];
}