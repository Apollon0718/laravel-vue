<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteComment extends Model
{
    protected $fillable = ['author', 'content'];
}
