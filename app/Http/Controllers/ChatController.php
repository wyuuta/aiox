<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;

class ChatController extends Controller
{
    
    public function getChat($id)
    {
        //function to show chats between 2 users
        $chats1 = Chat::where('from_user',Auth::user()->id)->where('to_user',$id)->get();
        $chats2 = Chat::where('from_user',$id)->where('to_user',Auth::user()->id)->union($chat1)->orderBy('created_at')->get();
        return view('chatbox',$chats2);
    }

    public function insertChat(Request $request)
    {
        //function to store new chat and refresh chatbox
        $chat = new Chat;
        $chat->from_user = Auth::user()->id;
        $chat->to_user = $request->to_user;
        $chat->content = $request->content;
        $chat->save();

        return index($request->to_user);
    }
}
