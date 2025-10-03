<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Lista todos os itens
    public function index()
    {
        $itens = Item::all();
        return view('itens.index', compact('itens'));
    }

    // Formulário de criação
    public function create()
    {
        return view('itens.create');
    }

    // Salvar novo item
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Item::create($request->all());

        return redirect()->route('itens.index')->with('success', 'Item criado com sucesso!');
    }

    // Mostrar um item
    public function show(Item $item)
    {
        return view('itens.show', compact('item'));
    }

    // Formulário de edição
    public function edit(Item $item)
    {
        return view('itens.edit', compact('item'));
    }

    // Atualizar item
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $item->update($request->all());

        return redirect()->route('itens.index')->with('success', 'Item atualizado com sucesso!');
    }

    // Excluir item
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('itens.index')->with('success', 'Item excluído com sucesso!');
    }
}
