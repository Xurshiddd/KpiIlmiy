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
        'quarter'
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function filesDoc()
    {
        return $this->morphOne(Attachment::class, 'attachment')->where('extra_identifier', 'document');
    }
    public function filesImg()
    {
        return $this->morphOne(Attachment::class, 'attachment')->where('extra_identifier', 'image');
    }
    public function patent()
    {
        return $this->morphOne(Attachment::class, 'attachment')->where('extra_identifier', 'patent');
    }
}
