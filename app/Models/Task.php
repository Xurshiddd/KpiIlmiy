<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'target_indicator_id',
        'quarter',
        'user_id',
        'year',
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
