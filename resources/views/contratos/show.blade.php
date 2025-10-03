@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-eye"></i> Detalhes do Contrato
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $contrato->id }}</p>
        <p><strong>Obra:</strong> {{ $contrato->obra_id }}</p>
        <p><strong>Fornecedor:</strong> {{ $contrato->fornecedor_id }}</p>
        <p><strong>Valor:</strong> R$ {{ number_format($contrato->valor, 2, ',', '.') }}</p>
        <p><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($contrato->data_inicio)->format('d/m/Y') }}</p>
        <p><strong>Data de Fim:</strong> {{ \Carbon\Carbon::parse($contrato->data_fim)->format('d/m/Y') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('contratos.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>
</div>
@endsection
