<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    protected $fillable = ['task_id', 'user_id','completed_items','cabinets_size','missing_pieces','status'];
     protected $casts = [ 'completed_items' => 'array'];
}
