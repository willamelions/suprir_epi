<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\Obra;
use App\Models\Item;
use Illuminate\Http\Request;

class ConsumoController extends Controller
{
    /**
     * Listagem de consumos
     */
    public function index()
    {
        $consumos = Consumo::with(['obra', 'item'])->orderBy('id', 'desc')->get();
        return view('consumos.index', compact('consumos'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        $obras = Obra::all();
        $itens = Item::all();
        return view('consumos.create', compact('obras', 'itens'));
    }

    /**
     * Salvar no banco
     */
    public function store(Request $request)
    {
        $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'item_id' => 'required|exists:itens,id',
            'quantidade' => 'required|integer|min:1',
            'responsavel' => 'nullable|string|max:255',
            'cpf_funcionario' => 'nullable|string|max:20',
            'data_consumo' => 'nullable|date',
        ]);

        Consumo::create($request->all());

        return redirect()->route('consumos.index')->with('success', 'Consumo registrado com sucesso!');
    }

    /**
     * Formulário de edição
     */
    public function edit(Consumo $consumo)
    {
        $obras = Obra::all();
        $itens = Item::all();
        return view('consumos.edit', compact('consumo', 'obras', 'itens'));
    }

    /**
     * Atualizar no banco
     */
    public function update(Request $request, Consumo $consumo)
    {
        $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'item_id' => 'required|exists:itens,id',
            'quantidade' => 'required|integer|min:1',
            'responsavel' => 'nullable|string|max:255',
            'cpf_funcionario' => 'nullable|string|max:20',
            'data_consumo' => 'nullable|date',
        ]);

        $consumo->update($request->all());

        return redirect()->route('consumos.index')->with('success', 'Consumo atualizado com sucesso!');
    }

    /**
     * Excluir
     */
    public function destroy(Consumo $consumo)
    {
        $consumo->delete();
        return redirect()->route('consumos.index')->with('success', 'Consumo removido com sucesso!');
    }
}
