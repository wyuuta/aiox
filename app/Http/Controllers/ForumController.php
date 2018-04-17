<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\MainThread
use app\Reply
use Redirect;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_thread(Request $request)
    {
        //
        $thread = new MainThread;
        $thread->title = $request->title;
        $thread->description = $request->description;
        $thread->user_id = Auth::user()->id;
        $thread->save();

        return Redirect::to('/forum');
    }

    public function store_reply(Request $request)
    {
        //
        $reply = new Reply;
        $reply->thread_id = $request->thread_id;
        $reply->user_id = Auth::user()->id;
        $reply->content = $request->content;
        $reply->save;

        return Redirect::to('/thread');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_thread($id)
    {
        //
        $threads = MainThread::all();
        return view('forum',$threads);
    }

    public function show_reply($id)
    {
        //
        $main = MainThread::where('thread_id',$id)->get();
        $replies = Reply::where('thread_id',$id)->get();
        return view('thread',$main,$replies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_thread($id)
    {
        //
        $thread = MainThread::where('thread_id',$id)->get();
        $thread->delete();

        return Redirect::to('/forum');
    }

    public function destroy_thread($id)
    {
        //
        $thread = Reply::where('reply_id',$id)->get();
        $thread->delete();

        return Redirect::to('/thread');
    }
}
