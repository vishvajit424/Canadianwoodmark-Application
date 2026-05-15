<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    //
    protected $fillable = [
    'user_id',
    'first_name',
    'last_name',
    'phone',
    'address',
    'department',
    'bio',
    'profile_image',
];
    public function user()
    {
     return $this->belongsTo('App\Models\User');
    }
    public function role() {
    return $this->belongsTo(Roles::class);
   }
    public function department() {
    return $this->belongsTo(Departments::class);
   }
}
