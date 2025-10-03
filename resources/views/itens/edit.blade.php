@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4">Editar Item</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('itens.update', $item) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ $item->nome }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control">{{ $item->descricao }}</textarea>
            </div>

            <button class="btn btn-primary">Atualizar</button>
            <a href="{{ route('itens.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
