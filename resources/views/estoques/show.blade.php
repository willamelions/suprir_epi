@extends('layouts.app')
@section('title', 'Detalhes do Estoque')

@section('content')
<h1>Detalhes do Estoque</h1>
<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $estoque->id }}</li>
    <li class="list-group-item"><strong>Obra:</strong> {{ $estoque->obra_id }}</li>
    <li class="list-group-item"><strong>Produto:</strong> {{ $estoque->produto_id }}</li>
    <li class="list-group-item"><strong>Quantidade:</strong> {{ $estoque->quantidade }}</li>
</ul>
<a href="{{ route('estoques.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
