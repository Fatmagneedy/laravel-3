<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerExample;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::fallback(function() {
    // return redirect('/');
    // });
// Route::prefix('lar')->group(function () {
//     Route::get('/', function () {
//         return view('test');
//     });

// Route::get('test', function ($id=15) {
//     return ('welcome to my frist laravel')   . $id;
// });
// Route::get('test1/{id}', function ($id) {
//     return 'The id is: '  . $id;
// });
// Route::get('test2/{id?}', function ($id=0) {
//     return 'The id is: ' . $id;
//     })->where(['id'=>'[0-9]+']);
// Route::get('test3/{id?}', function ($id=0) {
//         return 'The id is: ' . $id;
//         })->whereNumber('id');
  
//     Route::get('test4/{name?}', function ($name=null) {
//         return 'The name is: ' . $name;
//         })->whereAlpha('name');
//         Route::get('test5/{id}/{name}', function ($id ,$name) {
//             return 'The number is: ' . $id .    'andThe name is: '.$name;
//             })->where(['id'=>'[0-9]+','name'=>'[a-zA-z]+']);
// Route::get('test6/{name}', function ($name) {
//     return "The name is: " . $name;
//     })->whereIn('name',['Peter', 'Tony']);

//     });

Route::get('funa', function(){
    return view('about');
});

Route::get('unc', function(){
    return view('contactus');
});

        
Route::prefix('Blog')->group(function () {
  
  
Route::get('Sinces', function () {
    return ('welcome to my frist since leson');
});

Route::get('math/{id?}', function ($id=15) {
    return 'The number is: ' . $id*15;
    })->whereNumber('id');
    

    Route::get('medical/{name}', function ($name) {
        return 'The medical is: ' . $name;
        })->whereIn('name',['Nutrition', 'Thoracic','Urology']);

Route::get('sports/{name}', function ($name) {
    return "my fevorit is: " . $name;
    })->whereIn('name',['football', 'basketball','handball']);

    });
    Route::get('login', function(){
        return view('login');
    });
    // Route::post('logged', function(){
        // return ('you are login');
    // })->name('logged') ;
    Route::get('control', [ControllerExample::class, 
'show']);
Route::post('logged', function(Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');
    
    return 'Email: ' . $email . ' Password: ' . $password;
})->name('logged');



    
                 