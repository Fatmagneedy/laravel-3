<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Posts::get(); 
     
      return view('Posts', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insertposts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return dd($request);
        $post = new Posts();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->Auther = $request->Auther;
        if(isset($request->published)){
            $post->published = 1;
        }else{
            $post->published = 0;
        }
        
        $post->save();
        return 'Data success';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
