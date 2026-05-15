<?php

namespace App\Models;
use App\Models\User;
use App\Models\Task;
use App\Models\Departments;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['title', 'date','tag','assign_user','description','created_by','status'];

    public function employees()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function designing()
    {
        return $this->belongsToMany(Task::class)->withTimestamps();
    }
     public function measurement()
    {
        return $this->hasOne(Measurement::class);
    }

    public function designings()
    {
        return $this->hasOne(Designing::class);
    }

    public function cnc()
    {
        return $this->hasOne(Cnc::class);
    }
    public function users()
    {
    return $this->belongsToMany(User::class, 'task_user');
    }
    public function departments()
{
    return $this->belongsToMany(Departments::class);
}
 public function installing()
{
     return $this->hasOne(Installing::class);
}
    
}
