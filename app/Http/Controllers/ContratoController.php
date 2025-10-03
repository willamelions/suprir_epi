<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = \App\Models\Contrato::all();
        return view('contratos.index', compact('contratos'));
    }
    public function create()
    {
        return "Formulário para Novo Contrato";
    }

    public function store(Request $request)
    {
        return "Salvar Contrato";
    }

    public function show($id)
    {
        return "Detalhes do Contrato {$id}";
    }

    public function edit($id)
    {
        return "Editar Contrato {$id}";
    }

    public function update(Request $request, $id)
    {
        return "Atualizar Contrato {$id}";
    }

    public function destroy($id)
    {
        return "Excluir Contrato {$id}";
    }
}
