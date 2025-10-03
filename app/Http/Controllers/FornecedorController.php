<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = \App\Models\Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        return "Formulário para Novo Fornecedor";
    }

    public function store(Request $request)
    {
        return "Salvar Fornecedor";
    }

    public function show($id)
    {
        return "Detalhes do Fornecedor {$id}";
    }

    public function edit($id)
    {
        return "Editar Fornecedor {$id}";
    }

    public function update(Request $request, $id)
    {
        return "Atualizar Fornecedor {$id}";
    }

    public function destroy($id)
    {
        return "Excluir Fornecedor {$id}";
    }
}
