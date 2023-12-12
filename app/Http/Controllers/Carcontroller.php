<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;

class Carcontroller extends Controller
{
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
        $car = new Cars();
        $car->title = $request->title;
        $car->description = $request->description;
        if(isset($request->published)){
            $car->published = 1;
        }else{
            $car->published = 0;
        }
        
        $car->save();
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
