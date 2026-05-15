<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EdgeBender extends Model
{
    protected $fillable = ['task_id', 'user_id','timer_start','start_time','end_time','total_time','missing_pieces','finishing_materials','special_instructions','status'];
     protected $casts = [
        'timer_start' => 'datetime',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'finishing_materials' => 'array',
    ];
}
