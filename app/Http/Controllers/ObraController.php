<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    public function index()
    {
        $obras = Obra::orderBy('id', 'desc')->paginate(10);
        return view('obras.index', compact('obras'));
    }

    public function create()
    {
        return view('obras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
        ]);

        Obra::create($validated);

        return redirect()->route('obras.index')->with('success', 'Obra criada com sucesso!');
    }

    public function show(Obra $obra)
    {
        return view('obras.show', compact('obra'));
    }

    public function edit(Obra $obra)
    {
        return view('obras.edit', compact('obra'));
    }

    public function update(Request $request, Obra $obra)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
        ]);

        $obra->update($validated);

        return redirect()->route('obras.index')->with('success', 'Obra atualizada com sucesso!');
    }

    public function destroy(Obra $obra)
    {
        $obra->delete();

        return redirect()->route('obras.index')->with('success', 'Obra excluída com sucesso!');
    }
}
