<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerExample extends Controller
{
    public function show(){
        return 'welcome';
    }
    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/img';
        $request->image->move($path, $file_name);
        return 'Upload';
        }
}
