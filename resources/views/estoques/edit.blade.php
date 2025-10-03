@extends('layouts.app')
@section('title', 'Editar Estoque')

@section('content')
<h1>Editar Estoque</h1>
<form action="{{ route('estoques.update', $estoque->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Obra</label><input type="number" name="obra_id" class="form-control" value="{{ $estoque->obra_id }}"></div>
    <div class="mb-3"><label class="form-label">Produto</label><input type="number" name="produto_id" class="form-control" value="{{ $estoque->produto_id }}"></div>
    <div class="mb-3"><label class="form-label">Quantidade</label><input type="number" name="quantidade" class="form-control" value="{{ $estoque->quantidade }}"></div>
    <button type="submit" class="btn btn-warning">Atualizar</button>
    <a href="{{ route('estoques.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
