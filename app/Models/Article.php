<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author_id',
        'views',
        'quarter',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function filesDoc()
    {
        return $this->morphOne(Attachment::class, 'attachment');
    }
    public function filesImg()
    {
        return $this->morphOne(Attachment::class, 'attachment');
    }
}
