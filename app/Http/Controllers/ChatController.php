<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Auth;

class ChatController extends Controller
{
    
    public function getChat()
    {
        //function to show chats between 2 users
        $chats = Chat::all()->get();
        return view('chatbox',$chats);
    }

    public function insertChat(Request $request)
    {
        //function to store new chat and refresh chatbox
        $chat = new Chat;
        $chat->from_user = Auth::user()->id;
        $chat->content = $request->content;
        $chat->save();

        return getChat();
    }
}
