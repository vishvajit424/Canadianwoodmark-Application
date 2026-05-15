<?php

namespace App\Services;
use App\Models\Task;

class TaskService
{
    public function createUser(array $data)
    {
        // Your business logic for creating a user goes here
        // e.g., validation, database operations, event firing
        return \App\Models\User::create($data);
    }

    public function taskStatusUpdate($task_id,$status)
    {
       $status_id = Task::where('id',$task_id)->update(['status'=>$status]);
       return $status_id;
    }
}
