<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class Postcontroller extends Controller
{
    // private $columns = ['title', 'description' , 'Auther' ,'published',];
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
        // $post = new Posts();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->Auther = $request->Auther;
        // if(isset($request->published)){
        //     $post->published = 1;
        // }else{
        //     $post->published = 0;
        // }
        
        // $post->save();
        // return 'Data success';

        // $data = $request->only($this->columns);
        // $data['published'] = isset( $request->published);
        // Posts::create($data);
        // return redirect('posts');
            $data = $request->validate([
            'title'=>'required|string|max:50',
            'description'=> 'required|string',
            'Auther'=> 'required|string',
            ]);
            $data['published'] = isset( $request->published);
            Posts::create($data);
            return redirect('posts');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Posts::findOrFail($id);
        return view('showposts', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Posts::findOrFail($id);
        return view('editposts', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset( $request->published);
        Posts::where('id', $id)->update($data);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Posts::where('id', $id)->delete();
        return redirect('posts');
    }
    public function trashed()

    {
        $posts = Posts::onlyTrashed()->get();
        return view('trashedposts', compact('posts'));
    }
    public function forceDelete(string $id)
    {
        Posts::where('id', $id)->forceDelete();
        return redirect('posts');
    }
    public function restore(string $id)
    {
        Posts::where('id', $id)->restore();
        return redirect('posts');
    }

  
}
