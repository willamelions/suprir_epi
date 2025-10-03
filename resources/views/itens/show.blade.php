@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4">Detalhes do Item</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $item->id }}</p>
        <p><strong>Nome:</strong> {{ $item->nome }}</p>
        <p><strong>Descrição:</strong> {{ $item->descricao }}</p>

        <a href="{{ route('itens.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection
