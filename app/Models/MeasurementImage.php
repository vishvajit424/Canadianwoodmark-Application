<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementImage extends Model
{
   protected $fillable = [
        'measurement_id',
        'image_path',
    ];

    public function measurement()
    {
        return $this->belongsTo(Measurement::class);
    }
}
