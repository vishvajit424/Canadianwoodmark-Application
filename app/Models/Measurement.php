<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
       protected $fillable = [
        'task_id',
        'user_id',
        'comment',
        'status', 
    ];

    public function images()
    {
        return $this->hasMany(MeasurementImage::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
