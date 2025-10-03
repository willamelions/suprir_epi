@extends('layouts.app')

@section('title', 'Detalhes da Obra')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <i class="fas fa-eye"></i> Detalhes da Obra
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $obra->id }}</p>
        <p><strong>Nome:</strong> {{ $obra->nome }}</p>
        <p><strong>Responsável:</strong> {{ $obra->responsavel }}</p>
        <p><strong>Localização:</strong> {{ $obra->localizacao }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('obras.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
    </div>
</div>
@endsection
