<?php

namespace App\Http\Controllers;
use App\uploadvideo;
use App\like;
use App\comments;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class uploadvideocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selectvideo = uploadvideo::all();
        return view('uploadvideo',compact('selectvideo'));
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
     * @return \Illuminate\Http\Responsex
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('thumbnail'),$new_name);

        $video = $request->file('video');
        $video_name = rand().'.'.$video->getClientOriginalExtension();
        $video->move(public_path('videos'),$video_name);
        $videos_data = array(

            'v_title'=>$request->v_title,
            'v_category' => $request->v_category,
            'v_description' => $request->v_description, 
            'video' => $video_name,
            'image' => $new_name,
            'user_id' =>auth()->user()->id

        );


uploadvideo::create($videos_data);
return view('dashboard');
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
    public function destroy($id)
    {
        //
    }
}
