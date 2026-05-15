<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CNC extends Model
{
     protected $fillable = ['task_id', 'user_id','timer_start','start_time','end_time','total_time','recut_pieces','content','status'];
     protected $casts = [
          'timer_start' => 'datetime',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];
}
