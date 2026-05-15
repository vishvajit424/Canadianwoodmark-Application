<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tape extends Model
{
    protected $table = 'tapes';
    protected $fillable = ['name', 'slug'];
}
