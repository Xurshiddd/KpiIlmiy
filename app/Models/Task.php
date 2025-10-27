<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'target_indicator_id',
        'quarter',
        'user_id',
    ];
    public function targetIndicator()
    {
        return $this->belongsTo(TargetIndicator::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
