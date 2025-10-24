<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriorityTask extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    public function targetIndicators()
    {
        return $this->hasMany(TargetIndicator::class);
    }
}
