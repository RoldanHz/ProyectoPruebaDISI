<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\prueba;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\clienteController;
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
    return view('bienvenida');
});

//Ruta para enviar un mensaje por UML
Route::get('/nuevo', function(){
    return "Hola que tal gente muy buenas chaval";
});

//Ruta para mostrar una vista.
Route::view('/vista', 'prueba');

//Ruta para enviar parametros por medio de las rutas
Route::view('/vista', 'prueba', ['variable'=>'Punto de venta']);

//Ruta para llamar a una vista desde un controlador.
Route::get('/prueba-controller', [prueba::class, 'mostrarvista']);

//Ruta para recibir parametros en UML
Route::get('/nueva-vista', function(Request $request){
return "Hola ".$request->get('variable');
});
//ruta con la variable enviada: http://127.0.0.1:8000/nueva-vista?variable=Roldann

//Ruta para recibir parametros en la URL por medio del controlador.
Route::get('/parametros/{id}',[prueba::class, 'recibirParametros']);

//Grupo de rutas desde una vista
Route::prefix('ruta')->group(function(){
    Route::name('ruta.')->group(function(){
        Route::get('/users', function(){
            return view('prueba', ['variable'=>'Mercado pago']);
        })->name('users');
    Route::get('/users/crear', [prueba::class, 'create'])->name('users.create');
    Route::get('/users/show', [prueba::class, 'show'])->name('users.show');
    Route::get('/users/edit', [prueba::class, 'edit'])->name('users.edit');
    Route::get('/users/delete', [prueba::class, 'destroy'])->name('users.destroy');
    });
});



Route::resource('/proveedores', proveedorController::class)->middleware('auth');
Route::resource('/productos', productoController::class)->middleware('auth');
Route::resource('/clientes', clienteController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


#Rutas para las vistas de cada carpeta proveedores, productos y clientes

