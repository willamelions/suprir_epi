@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Itens</h1>
    <a href="{{ route('itens.create') }}" class="btn btn-success">+ Novo Item</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($itens as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->descricao }}</td>
                            <td>
                                <a href="{{ route('itens.show', $item) }}" class="btn btn-sm btn-primary">👁</a>
                                <a href="{{ route('itens.edit', $item) }}" class="btn btn-sm btn-warning">✏</a>
                                <form action="{{ route('itens.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Excluir este item?')" class="btn btn-sm btn-danger">🗑</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center">Nenhum item encontrado.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
