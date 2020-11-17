<?php

use Illuminate\Support\Facades\Route;

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


/*
Route::get('/usuarios', function () {
    return view('welcome');
});

Route::post('/crear',function(){
	echo "hola";
});

Route::put('/actualizar',function(){
	echo "hola2";
});

Route::delete('/eliminar',function(){
	echo "hola3";
});

Route::match(array('GET', 'POST'),'/usuarios',function(){
	return view('welcome');
});

Route::any('/usuarios',function(){
	return view('welcome');
});

//Parametros
Route::get('/usuarios/{id}',function($id){
	echo "hola".$id;
});

//Parametros opcionales
Route::get('/usuarios/{id?}',function($id=0){
	echo "hola".$id;
});

//Validación de rutas
Route::get('/suma/{num1}/{num2}',function($num1,$num2){

	echo "El resultado es: ".($num1 + $num2)."<br>";
	echo "El resultado es: ".($num1 - $num2);

})->where(array('num1'=>'[0-9]+', 'num2'=>'[0-9]+'));
//->where('num1','[0-9]+')->where('num2','[0-9]+');

Route::get('/suma/{num1}/{num2}','WebController@suma')->where(array('num1'=>'[0-9]+', 'num2'=>'[0-9]+'));
//1.- App\Http\Controllers\WebController@suma
//2.- Se modifico la linea 29 en app/Providers//RouteServiceProvider.php (se descomentó y se le quitó los / sobrantes)
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']],function(){

	//BOOKS
	Route::get('/books', 'BookController@index');

	Route::post('/books', 'BookController@store');

	//CATEGORIES
	Route::get('/categories','CategoryController@index');

	Route::post('/categories','CategoryController@store');

	Route::put('/categories','CategoryController@update');

	Route::delete('/categories/{category}','CategoryController@destroy');
});
