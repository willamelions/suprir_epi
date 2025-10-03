<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index(Request $request)
    {
        $obraId = $request->get('obra_id');
        $estoques = \App\Models\Estoque::when($obraId, fn($q) => $q->where('obra_id', $obraId))->get();

        return view('estoques.index', compact('estoques'));
    }

}
