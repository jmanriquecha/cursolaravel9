<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Creando Mis rutas personalizadas
 */
Route::get('blog', function(){
    return "Listado de publicaciones";
});
 Route::get('blog/{slug}', function($slug){
    //Consulta a base de datos
    return $slug;
 });

 Route::get('buscar', function(Request $request){
    return $request->all();
 });

 
Route::get('/user', [UserController::class, 'delete']);
Route::post('/user/{id}/{od}', [UserController::class, 'index']);

/**
 * Redirigir ruta
 */

 Route::redirect('/', '/blog', 404);

 /**
  * Devolver vista desde la ruta
  */

Route::view('mostrar', 'welcome', ['name' => 'Laravel']);

/**
 * Capturar segmento de la ruta
 */

Route::get('country/{id}', function($id){
    return "Id Country {$id}";
});

Route::get('posts/{post_id}/comments/{comment_id}', function($post_id, $comment_id){
    return "Post id {$post_id}, comment {$comment_id}";
});

Route::get('users/{id}', function(Request $request, $id){
    return "User {$id}";
});

/**
 * Pasar parámetros que no siempre estan presentes
 * 
 */
Route::get('inicio/{post?}', function($post = null){
    if(isset($post)){
        $post = $post;
    }
    else{
        $post = "No se ha enviado ningun parámetro";
    }
    return $post;
});


/**
 * restringir formato de parametros 
 */

Route::get('products/{name}/category/{category}', function($name, $category){
    return "Mensaje expres";
})->where('name', '[5-9]+');


/**
 * Rutas con nombre
 */

Route::get('user/profile', function(){
    return "????";
})->name('profile');
