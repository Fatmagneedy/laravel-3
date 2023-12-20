<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;

class Carcontroller extends Controller
{
    // private $columns = ['title', 'description' , 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $car = cars::get() ; 
     
      return view('cars', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addcars');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return dd($request);
        // $car = new Cars();
        // $car->title = $request->title;
        // $car->description = $request->description;
        // if(isset($request->published)){
        //     $car->published = 1;
        // }else{
        //     $car->published = 0;
        // }
        
        // $car->save();
        // return 'Data success';
        // $data = $request->only($this->columns);
        // $data['published'] = isset( $request->published);
        // Cars::create($data);
        // return redirect('cars');

            $data = $request->validate([
            'title'=>'required|string|max:50',
            'description'=> 'required|string',
            ]);
            $data['published'] = isset( $request->published);
            Cars::create($data);
            return redirect('cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Cars::findOrFail($id);
         return view('showcar', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $car = Cars::findOrFail($id);
         return view('editcar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset( $request->published);
        Cars::where('id', $id)->update($data);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cars::where('id', $id)->delete();
        return redirect('cars');
    }
    public function SoftDeletes(string $id)
    {
        Cars::where('id', $id)->SoftDeletes();
        return redirect('cars');
    }

    public function trashed()

    {
        $cars = Cars::onlyTrashed()->get();
        return view('trashedcars', compact('cars'));
    }
    public function forceDelete(string $id)
    {
        Cars::where('id', $id)->forceDelete();
        return redirect('cars');

    }    
    public function restore(string $id)
    {
        Cars::where('id', $id)->restore();
        return redirect('cars');
    }
      
        
}