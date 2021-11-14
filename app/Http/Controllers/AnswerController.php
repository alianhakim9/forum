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

    public function my_answer()
    {
        if (auth()->user() == NULL) {
            return view('answer/detail', [
                'status' => false,
                'message' => 'Harap login terlebih dahulu'
            ]);
        } else {
            $myAnswer = Answer::where('user_id', auth()->user()->id)->get();
            return view('answer/detail', [
                'status' => true,
                'myAnswers' => $myAnswer
            ]);
        }
    }
}
