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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TasksController;

Route::get('/', [ TasksController::class, 'index' ] )
    ->name('tasks.index');

Route::post('/tasks/inserir', [ TasksController::class, 'inserir' ] )
    ->name('tasks.inserir');

Route::get('/tasks/editar/{id}', [ TasksController::class, 'editar' ] )
    ->name('tasks.editar');

Route::post('/tasks/update', [ TasksController::class, 'update' ] )
    ->name('tasks.update');

Route::get('/tasks/deletar/{id}', [ TasksController::class, 'deletar' ] )
    ->name('tasks.deletar');

Route::get('/tasks/restaurar/{id}', [ TasksController::class, 'restaurar' ] )
    ->name('tasks.restaurar');

Route::get('/tasks/cadastrar', [ TasksController::class, 'cadastrar' ] )
    ->name('tasks.cadastrar');

use App\Http\Controllers\UsersController;

Route::get('/painel/usuarios/login', [ UsersController::class, 'login' ] )
    ->name('painel.usuarios.login');

Route::post('/painel/usuarios/logar', [ UsersController::class, 'logar' ] )
    ->name('painel.usuarios.logar');

Route::get('/painel/usuarios/index', [ UsersController::class, 'index' ] )
    ->name('painel.usuarios.index');

Route::get('/painel/usuarios/sair', [ UsersController::class, 'sair' ] )
    ->name('painel.usuarios.sair');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/categorias', function(){
    return view( 'categorias.index' );
})->name('categorias.index');

use Illuminate\Http\Request;

Route::post('/categorias/store', function( Request $request ){
    // dd( $request->file( 'photo' ) );
    // dd( $request->file( 'photo' )->isValid() );

    if ( $request->file('photo')->isValid() ) {
        // dd( $request->photo->extension() );
        $photo = cirand(28) . '.' . $request->photo->extension();
        // $request->photo->store('categorias');
        $request->photo->storeAs('categorias', $photo);
    }
})->name('categorias.store');