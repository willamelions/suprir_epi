@extends('layouts.app')
@section('title', 'Novo Estoque')

@section('content')
<h1>Novo Estoque</h1>
<form action="{{ route('estoques.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label class="form-label">Obra</label><input type="number" name="obra_id" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Produto</label><input type="number" name="produto_id" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Quantidade</label><input type="number" name="quantidade" class="form-control"></div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('estoques.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
