<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Images;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function add_view()
    {
        return view('/question/add');
    }

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

        return redirect('tambah')->with('success', 'Image have been saved');
    }
}
