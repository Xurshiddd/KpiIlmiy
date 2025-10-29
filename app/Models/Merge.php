<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merge extends Model
{
    protected $fillable = [
        'user_id',
        'target_indicator_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function targetIndicator()
    {
        return $this->belongsTo(TargetIndicator::class);
    }
}
