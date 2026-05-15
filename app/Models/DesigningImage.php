<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesigningImage extends Model
{
    protected $table = 'designing_images';
    protected $fillable = [
        'designing_id',
        'image_path',
    ];

    public function designing()
    {
        return $this->belongsTo(Designing::class);
    }
}
