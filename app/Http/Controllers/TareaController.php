<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TareaController extends Controller
{
    public function CrearTarea(Request $request){
        $validation = Validator::make ($request->all(), [
            'Titulo' => 'required|max:10|min:1',
            'Contenido' => 'required|max:25|min:1',
            'autor' => 'required|max:15|min:1'
        ]);

    if ($validation->fails())
    return response($validation->errors (), 401);
    
    $tarea = new Tarea ();
    $tarea -> Titulo = $request -> post ('Titulo');
    $tarea -> Contenido = $request -> post ('Contenido');
    $tarea -> Estado = 'En Proceso';
    $tarea -> autor = $request -> post ('autor');
    $tarea -> save();
    return $tarea;
    }

    public function ListarTarea(Request $request){
        return Tarea::all();
    }

    public function ListarUnaTarea(Request $request, $id){
        return Tarea::FindOrFail($id);
    }

    public function ActualizarTarea(Request $request, $id){
        $validation = Validator::make($request->all(), [
            'Titulo' => 'max:10|min:1',
            'Contenido' => 'max:25|min:1',
            'Estado' => 'in:En Proceso,Terminado',
            'autor' => 'max:15|min:1'
        ]);

        if($validation->fails())
        return response($validation->errors(), 401);

        $tarea = Tarea::FindOrFail($id);
        $tarea -> Titulo = $request -> input('Titulo', $tarea ->Titulo);
        $tarea -> Contenido = $request -> input('Contenido',$tarea ->Contenido);
        $tarea -> Estado = $request -> input('Estado',$tarea ->Estado);
        $tarea -> autor = $request -> input('autor', $tarea ->autor);
        $tarea -> save();

        return $tarea;
    }

    public function EliminarTarea(Request $request, $id){
       Tarea::FindOrFail($id) -> delete();
    }



}
