<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function user_profile()
    {
        $id = auth()->user()->id;
        $user = User::where('id', '=', $id)->get();
        return view('user/profile', [
            'user' => $user
        ]);
    }
}
