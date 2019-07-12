<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = App\Message::all();
        return view('messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = App\Message::find($id);
        return view('messages.show', [
            'message' => $message
        ]);
    }
}
