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

        $dateTime = date('Ymd_his');
        $newName = 'image_' . $dateTime . '.' . $ext;

        $file->move(storage_path(env('PATH_IMAGE')), $newName);

        $images = new images();
        $images->image_title = $request->image_title;
        $images->image_desc = $request->image_desc;
        $images->image_src = $newName;

        $images->save();

        return redirect('tambah')->with('success', 'Image have been saved');
    }
}
