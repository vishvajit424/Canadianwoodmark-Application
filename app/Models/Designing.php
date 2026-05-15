<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designing extends Model
{
     use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'name',
        'email',
        'phone_no',
        'lock_code',
        'address',
        'delivery_date',
        'material',
        'tape',
        'handle',
        'layout_pdf',
        'updated_pdf',
        'updated_by',
        'updated_pdf_user_role',
        'content',
        'status',
    ];

    protected $casts = [
        'delivery_date' => 'date',
    ];

    /* ================= Relationships ================= */

    // public function task()
    // {
    //     return $this->belongsTo(Task::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function kitchenColor()
    {
        return $this->hasOne(KitchenColor::class, 'design_id');
    }
}
