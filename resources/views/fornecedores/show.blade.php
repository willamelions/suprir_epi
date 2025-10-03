@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-eye"></i> Detalhes do Fornecedor
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $fornecedor->id }}</p>
        <p><strong>Nome:</strong> {{ $fornecedor->nome }}</p>
        <p><strong>CNPJ:</strong> {{ $fornecedor->cnpj }}</p>
        <p><strong>Telefone:</strong> {{ $fornecedor->telefone }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>
</div>
@endsection
