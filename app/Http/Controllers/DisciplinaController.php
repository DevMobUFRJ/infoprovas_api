<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    function getAll(Request $request, $curso_id){
        $curso = Curso::find($curso_id);
        if(empty($curso) || $curso->count() == 0){
            return $this->resource_error();
        } else {
            return response()->json($curso->disciplinas);
        }
    }

    function get(Request $request, $curso_id, $disciplina_id){
        $disciplina = Disciplina::whereId($disciplina_id)->where('curso_id', $curso_id)->get()->first();
        if(empty($disciplina)){
            return $this->resource_error();
        } else {
            return response()->json($disciplina);
        }
    }
}
