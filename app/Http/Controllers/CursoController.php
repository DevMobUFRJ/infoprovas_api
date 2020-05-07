<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    function getAll(Request $request){
        return response()->json(Curso::all());
    }

    function get(Request $request, $id){
        return response()->json(Curso::find($id));
    }
}
