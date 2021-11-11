<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    function add(Request $request, $question_id)
    {
        $user_id = auth()->user()->id;

        $answer = new Answer();
        $answer->user_id = $user_id;
        $answer->question_id = $question_id;
        $answer->answer = $request->answer;
        $answer->save();

        return redirect('detail/' . $question_id);
    }
}
