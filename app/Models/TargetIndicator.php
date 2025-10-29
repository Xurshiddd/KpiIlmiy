<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetIndicator extends Model
{
    protected $fillable = [
        'priority_task_id',
        'name',
        'description',
        'status',
        'count_name',
        'count_value',
    ];
    public function priorityTask()
    {
        return $this->belongsTo(PriorityTask::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function merges()
    {
        return $this->hasMany(Merge::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'merges')
            ->withTimestamps();
    }

}
