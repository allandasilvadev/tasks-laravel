<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tasks;

class TasksController extends Controller
{
    public function index()
    {
        // $tasks = Tasks::all();
        $tasks = Tasks::withTrashed()->get();

        return view( 'tasks.index', [ 'tasks' => $tasks ] );
    }


    public function cadastrar()
    {
        return view( 'tasks.cadastrar', [ 'title' => 'Painel | Cadastrar' ] );
    }

    public function inserir( Request $request )
    {
        $validator = Validator::make( $request->all(), [
            'task' => 'required|min:4'
        ]);

        if ( $validator->fails() ) {
            return redirect()->route( 'tasks.cadastrar' )->with( 'errors', $validator->messages() );
        }

        $task = new Tasks();
        $task->task = $request->input('task');
        $task->save();

        return redirect()->route( 'tasks.index' )->with( 'messages', 'Task cadastrada com sucesso.' );
    }

    public function editar( $id = 0 )
    {
        $id = intval( $id );

        if ( $id != 0 ) {

            // $task = Tasks::find($id);
            $task = Tasks::withTrashed()->find( $id );

            if ( $task != null ) {
                return view( 'tasks.editar', [ 'task' => $task, 'title' => 'Painel | Editar' ] );
            } else {
                return redirect()->route( 'tasks.index' )->with( 'messages', 'Task não encontrada.' );
            }            

        } else {
            return redirect()->route( 'tasks.index' )->with( 'messages', 'Task não encontrada.' );
        }
    }

    public function update( Request $request )
    {
        $validator = Validator::make( $request->all(), [
            'task' => 'required|min:4'
        ]);

        if ( $validator->fails() ) {
            return redirect()->route( 'tasks.editar', [ 'id' => $request->input('taskid') ] )
                ->with( 'errors', $validator->messages() );
        }

        $taskid = intval( $request->input('taskid') );
        // Tasks::where([ 'id' => $taskid ] )->update([ 'task' => $request->input('task') ]);
        Tasks::withTrashed()
            ->where([ 'id' => $taskid ] )
            ->update([ 'task' => $request->input('task') ]);

        return redirect()->route( 'tasks.index' )->with( 'messages', 'Task editada com sucesso.' );

    }

    public function deletar( $id = 0 ) 
    {
        $id = intval( $id );

        if ( $id != 0 ) {

            $task = Tasks::find( $id );

            if ( $task != null ) {
                $taskid = intval( $id );
                $task = Tasks::find( $taskid );
                $task->delete();

                return redirect()->route( 'tasks.index' )
                    ->with( 'messages', 'Task deletada com sucesso' );
            } else {
                return redirect()->route( 'tasks.index' )
                    ->with( 'messages', 'Task não encontrada.' );
            }

        } else {
            return redirect()->route( 'tasks.index' )
                ->with( 'messages', 'Task não encontrada.' );
        }
    }

    public function restaurar( $id = 0 ) 
    {
        $id = intval( $id );

        if ( $id != 0 ) {

            $task = Tasks::withTrashed()->find( $id );

            if ( $task != null ) {
                $taskid = intval( $id );
                $task = Tasks::withTrashed()->find( $id );
                $task->restore();

                return redirect()->route( 'tasks.index' )
                    ->with( [ 'messages' => 'Task restaurada com sucesso.', 'type' => 'danger' ] );

            } else {
                return redirect()->route( 'tasks.index' )
                    ->with( [ 'messages' => 'Task não encontrada.', 'type' => 'warning' ] );
            }

        } else {
            return redirect()->route( 'tasks.index' )
                ->with( [ 'messages' => 'Task não encontrada.', 'type' => 'warning' ] );
        }
    }
}
