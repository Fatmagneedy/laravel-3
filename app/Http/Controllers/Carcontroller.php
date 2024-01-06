<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use App\Models\categories;
use App\Traits\Common;
class Carcontroller extends Controller
{
    use Common;
    // private $columns = ['title', 'description' , 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $car = cars::get();
     
     
      return view('cars', compact('car'));
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categories::get();
        return view('addcars', compact('categories'));
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
    $messages = $this->messages();
    
    $data = $request->validate([
        'title' => 'required|string|max:50',
        'description' => 'required|string',
        'mobile' => 'required|string|max:11',
        'image' => 'required|mimes:png,jpg,jpeg|max:2048',
    ], $messages);
    
    $fileName = $this->uploadFile($request->image, 'assets/img');
    $data['image'] = $fileName;
    
    $data['published'] = isset($request->published); 
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
        $categories = Categories::get();
         return view('editcar', compact('car','categories'));

         

    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = $this->messages();
        
        $data = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            ], $messages);

            $car = Cars::findOrFail($id);
            $car->title = $data['title'];
            $car->description = $data['description'];

            if ($request->hasFile('image')) {
                // Delete the previous image
            $this->deleteFile($car->image, 'assets/img');
            $fileName = $this->uploadFile($request->image,'assets/img');
            $car['image'] = $fileName;
            }
            $data['published'] = isset( $request->published);
            Cars::where('id', $id)->update($data);
            $car->save();
            return redirect('cars');
        // $data = $request->only($this->columns);
        
        
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
    public function messages()

    {
    
    
      return [
        'title.required'=>'title is required',
        'title.string'=>'Should be string',
        'description.required'=> 'should be text',
        'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size exceeded',
        ];   
        
        }
        private function deleteFile($fileName, $path)
        {
            $filePath = public_path($path . '/' . $fileName);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
}
