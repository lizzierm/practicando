<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);

    Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RolController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RolController::class, 'store'])->name('roles.store');
    Route::get('/roles/{rol}/edit', [RolController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{rol}', [RolController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{rol}', [RolController::class, 'destroy'])->name('roles.destroy');

    Route::resource('usuarios', UsuarioController::class);
     // Redirige a la vista del formulario para crear usuario
    //  Route::get('/usuarios', [RolController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');


    Route::resource('blog', BlogController::class);

    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    Route::get('/productos', [ProductosController::class, 'index'])->name ('producto.index');
    // Route::delete('/blogs/{blog}', 'BlogController@destroy')->name('blogs.destroy');
    // Route::get('/blogs/{blog}/edit', 'BlogController@edit')->name('blogs.edit');

    
});
//ingresa sin autentificarse
Route::resource('articulos', 'App\Http\Controllers\ArticuloController');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index');

// ----------------------------------

Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dash', function () {
return view('dash.index');
    })->name('dash');
});
// Route::get('/dash/crud', function(){
// return view('crud.index');
// });
// Route::get('/dash/crud', function(){
//     return view('crud.create');
//     });