<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installing extends Model
{
    protected $fillable = ['task_id','user_id','special_instructions', 'missing_stuff','pdf_file','status'];
}
