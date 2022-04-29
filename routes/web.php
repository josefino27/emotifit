<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reservasController;
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

// enviamos mensaje por url:
Route::get('/reservas',function(){
    return "<h1>Bienvenido a reservas emotifit</h1>";
});

// mostramos una vista
Route::view('/reservar','reservas');

// enviar parametros por medio de la ruta
Route::view('/reservar','reservas',['titulo'=>'emotifit']);

// ruta mediante un controlador
Route::get('/reservasController',[reservasController::class,'index']);

// recibir parametro mediante url .. agregamos ?
Route::get('/reservar',function(Request $request){
    return "Bienvenido".$request->get('variable');
});

// recibir parametros en la url por medio del controlador
Route::get('/reservasController/{id}',
[reservasController::class,'recibirParametros'])
->name('rutaId'); //nombramos la ruta "rutaId"

// grupo de rutas
Route::prefix('ruta')->group(function(){
    Route::name('ruta.')->group(function(){
        Route::get('/reserve',function(){
            return view('reservas',['titulo'=>'emotifit']);
        })->name('reserve');

        Route::get('/reserve/show',[reservasController::class,
        'show'])->name('reserve.show');
        Route::get('/reserve/create',[reservasController::class,
        'create'])->name('reserve.create');
        Route::get('/reserve/edit',[reservasController::class,
        'edit'])->name('reserve.edit');
        Route::get('/reserve/delete',[reservasController::class,
        'destroy'])->name('reserve.delete');
    });

});

Route::get('clases',[reservasController::class,'mostrarClases'])->middleware('validarUser');
Route::get('no_admin',[reservasController::class,'noAdmin'])->name('no_admin');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
