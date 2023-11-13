<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reservasController;
use Illuminate\Http\Request;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\NutricionController;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\EmocionController;
use App\Http\Controllers\EmocionxusuarioController;
use App\Http\Controllers\permisosController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\UserIndex;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MusculoController;
use App\Http\Controllers\RutinasEjercicios;
use App\Http\Controllers\UserxEmocionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/reservasP',function(){
    return "<h1>Bienvenido a reservas emotifit</h1>";
});

// mostramos una vista
Route::view('/reservar','reservas');

// enviar parametros por medio de la ruta
Route::view('/reservas','reservas',['titulo'=>'emotifit']);

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

Route::group(['middleware'=>['auth']], function(){
    Route::resource('clases',ClaseController::class);
    Route::resource('rutinas',RutinaController::class);
    Route::resource('reservas',reservasController::class);
    Route::resource('nutricion',NutricionController::class);
    Route::resource('ejercicios',EjercicioController::class);
    Route::resource('permisos',permisosController::class);
    Route::resource('role',RoleController::class);
    Route::get('user',UserIndex::class);
    Route::resource('users',UserController::class);
    Route::resource('musculos',MusculoController::class);
    Route::resource('rutinasEjercicios',RutinasEjercicios::class);
    Route::resource('emocion',EmocionController::class);
    Route::resource('emocionxusuarios',EmocionxusuarioController::class);
    Route::resource('posts',PostController::class);
});



// Route::post('calcularIMC',[ImcController::class,'store'])->name('calcularIMC');

