<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['name', 'content', 'file'];

    protected $with = ['comments'];

    public function comments()
    {
        return $this->hasMany(NoteComment::class, 'note_id');
    }
}
