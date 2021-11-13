<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BugReportController extends Controller
{
    public function send(Request $request)
    {
        $subject = $request->input('subject');
        $message = $request->input('message');
        $developer_email = 'chiplogger212@gmail.com';

        \Mail::to($developer_email)->send(
            new \App\Mail\BugReportMail(
                $subject,
                $message,
                $developer_email
            )
        );

        return "Terima kasih telah melaporkan bug";
    }
}
