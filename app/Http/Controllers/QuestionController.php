<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function add_view()
    {
        return view('question/add');
    }

    
}
