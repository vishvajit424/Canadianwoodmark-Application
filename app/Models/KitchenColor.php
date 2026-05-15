<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KitchenColor extends Model
{
   use HasFactory;

    protected $fillable = [
        'design_id',
        'upper_cabinet',
        'riser',
        'base_cabinet',
        'handle',
        'island',
        'garbage_bin',
        'vanities',
        'spice_rack',
    ];

    /* ================= Relationships ================= */

    public function designing()
    {
        return $this->belongsTo(Designing::class, 'design_id');
    }
}
