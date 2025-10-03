@extends('layouts.app')
@section('title', 'Lista de Estoques')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Estoques</h1>
    <a href="{{ route('estoques.create') }}" class="btn btn-success">+ Novo</a>
</div>

@if($estoques->isEmpty())
    <div class="alert alert-warning">Nenhum estoque encontrado.</div>
@else
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Obra</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estoques as $estoque)
            <tr>
                <td>{{ $estoque->id }}</td>
                <td>{{ $estoque->obra_id}}</td>
                <td>{{ $estoque->produto_id }}</td>
                <td>{{ $estoque->quantidade }}</td>
                <td>
                    <a href="{{ route('estoques.show', $estoque->id) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="{{ route('estoques.edit', $estoque->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('estoques.destroy', $estoque->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir este estoque?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
