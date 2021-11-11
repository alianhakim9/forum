<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answers';

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function question()
    {
        return $this->belongsTo(Question::class);
    }
}
