<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'questions';
    protected $fillable = ['title', 'description', 'image_src'];
}
