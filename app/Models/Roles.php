<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'user_roles';
   protected $fillable = ['name', 'navmenu_data'];

    protected $casts = [
        'navmenu_data' => 'array',
    ];

public function userdetails()
{
     return $this->hasOne('App\Models\UserDetails');
}
}
