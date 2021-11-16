<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function __construct()
    {
    }

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

    public function get_answer_for_update(Request $request, $answer_id)
    {
        $answer = Answer::where('id', $answer_id)->get()->first();
        return view('answer/edit', [
            'data' => $answer
        ]);
    }

    public function update(Request $request, $id)
    {
        $question_id = Answer::where('id', $id)->get();
        DB::table('answers')->where('id', $id)->update([
            'answer' => $request->answer,
        ]);
        return redirect('detail/' . $question_id[0]['question_id']);
    }

    public function delete($id)
    {
        $question_id = Answer::where('id', $id)->get();

        Answer::where('id', $id)->delete();
        return redirect('detail/' . $question_id[0]['question_id']);
    }
}
