@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-eye"></i> Detalhes do Consumo
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $consumo->id }}</p>
        <p><strong>Estoque:</strong> {{ $consumo->estoque_id }}</p>
        <p><strong>Quantidade:</strong> {{ $consumo->quantidade }}</p>
        <p><strong>Data do Consumo:</strong> {{ \Carbon\Carbon::parse($consumo->data_consumo)->format('d/m/Y') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('consumos.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>
</div>
@endsection
