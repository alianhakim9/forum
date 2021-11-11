<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Images;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class QuestionController extends Controller
{

    public function index()
    {
        $question = Question::with('user')->get();
        return view('welcome', [
            'questions' => $question
        ]);
    }

    public function detail($question_id)
    {
        $question = Question::with('user')->where('id', $question_id)->first();
        $answer = Answer::with('user')->where('question_id', $question_id)->get();

        return view('question/detail', [
            'question' => $question,
            'answers' => $answer
        ]);
    }

    public function add_view()
    {
        return view('/question/add');
    }

    public function view_image($fileImage)
    {
        $filePath = storage_path(env('PATH_IMAGE') . $fileImage);
        return Image::make($filePath)->response();
    }

    public function view_by_user_id()
    {
        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->get();
        $data = Question::where('user_id', $user_id)->get();

        return view('user/profile', [
            'user' => $user,
            'questions' => $data
        ]);
    }

    // Tambah Question
    public function store(Request $request)
    {
        $file = $request->file('image_src');
        $ext = $file->getClientOriginalExtension();

        $user_id = auth()->user()->id;

        $dateTime = date('Ymd_his');
        $newName = 'image_' . $dateTime . '.' . $ext;

        $file->move(storage_path(env('PATH_IMAGE')), $newName);

        $question = new Question();
        $question->user_id = $user_id;
        $question->title = $request->title;
        $question->description = $request->description;
        $question->image_src = $newName;

        $question->save();

        return redirect('/');
    }

    // Edit Question berdasarkan id question

    // Hapus Question Berdasarkan id question
}
