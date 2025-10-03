@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4">Novo Item</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('itens.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control"></textarea>
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="{{ route('itens.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
