<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerExample;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Postcontroller;


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
// Routes for the cars table
    Route::get('createcars', [CarController::class, 
     'create']);
     Route::get('cars', [CarController::class, 
     'index']);
     Route::post('storecars', [CarController::class, 
     'store'])->name('storecars');
     Route::get('createcars', [CarController::class, 
     'create']);
     
     Route::post('storecars', [CarController::class, 
     'store'])->name('storecars');
     Route::controller(OrderController::class)->group(function () {
         Route::get('/orders/{id}', 'show');
         Route::post('/orders', 'store');
     });
     // Routes for the posts table
     Route::get('createposts', [Postcontroller::class, 
     'create']);
     Route::get('posts', [Postcontroller::class, 
     'index']);
     Route::post('storepost', [Postcontroller::class, 
     'store'])->name('storeposts');
     Route::get('createposts', [Postcontroller::class, 
     'create']);
     
     Route::post('storeposts', [Postcontroller::class, 
     'store'])->name('storeposts');
     Route::controller(Postcontroller::class)->group(function () {
         Route::get('/orders/{id}', 'show');
         Route::post('/orders', 'store');
     });
     Route::get('editcar/{id}', [CarController::class, 
     'edit'])->name('editcar');

     Route::get('editposts/{id}', [Postcontroller::class, 
     'edit'])->name('editposts');
     
     Route::put('updatecar/{id}', [CarController::class, 
     'update'])->name('updatecar');
     
     Route::put('updateposts/{id}', [Postcontroller::class, 
     'update'])->name('updateposts');

     Route::get('showcar/{id}', [CarController::class, 
     'show'])->name('showcar');

     Route::get('showposts/{id}', [Postcontroller::class, 
     'show'])->name('showposts');

     Route::get('deletcar/{id}', [CarController::class, 
     'destroy'])->name('deletcar');

     Route::get('deleteposts/{id}', [Postcontroller::class, 
     'destroy'])->name('deleteposts');

     Route::get('SoftDeletescar/{id}', [CarController::class, 
     'SoftDeletes'])->name('SoftDeletescar');

     Route::get('SoftDeletesposts/{id}', [Postcontroller::class, 
     'SoftDeletes'])->name('SoftDeletesposts');

     Route::get('trashedposts', [Postcontroller::class, 
     'trashed'])->name('trashedposts');

     Route::get('trashedcars', [CarController::class, 
     'trashed'])->name('trashedcars');

     Route::get('forceDeleteposts/{id}', [Postcontroller::class, 
     'forceDelete'])->name('forceDeleteposts');

     Route::get('forceDeletecars/{id}', [CarController::class, 
     'forceDelete'])->name('forceDeletecars');

     Route::get('restoreposts/{id}', [Postcontroller::class, 
     'restore'])->name('restoreposts');

     Route::get('restorecars/{id}', [CarController::class, 
     'restore'])->name('restorecars');

     Route::get('test', function () {
            return view('test');
        });
        Route::get('image', function () {
            return view('image');
        });
        Route::post('imageupload', [ControllerExample::class, 
        'upload'])->name('imageupload');
        
        



Auth::routes(['verify'=>true]);
Route::get('createcars',  [CarController::class, 'create'])->middleware('verified')->name('createcars');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
