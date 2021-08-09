<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use Carbon\Carbon;

class PostsController extends Controller
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
        $post = new Attendance;
        $post -> checkIn = Carbon::now();
        $post-> user_id = auth()->user()->id;
        $post-> working_date = date('Y-m-d');
        $post->save();
        return view('pages.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Attendance;
        $post -> checkIn = Carbon::now();
        $post-> user_id = auth()->user()->id;
        $post->save();
        $posts = Attendance::all();
        return view('pages.home')->with('posts',$posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Attendance::find($id);
        $post->checkIn = $post->checkIn;
        $post -> checkOut = Carbon::now();
        $post ->save();
        // dd($post->checkIn);
        $posts-> Attendance::all();
        return view('pages.home')->whit('posts',$posts);
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
        $post = Attendance::find($id);
        // $post->checkIn = $post->checkIn;
        // $post -> checkOut = Carbon::now();
        // $post ->save();
        dd($post);
        return view('pages.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
