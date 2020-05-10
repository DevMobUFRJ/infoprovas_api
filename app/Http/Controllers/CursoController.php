<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    function getAll(Request $request){
        return response()->json(Curso::all());
    }

    function get(Request $request, $curso_id){
        $curso = Curso::find($curso_id);
        if(empty($curso)){
            return $this->resource_error();
        } else {
            return response()->json($curso);
        }
    }
}
