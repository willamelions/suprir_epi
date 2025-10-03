@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <i class="bi bi-pencil"></i> Editar Fornecedor
    </div>
    <div class="card-body">
        <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $fornecedor->nome }}" required>
            </div>
            <div class="mb-3">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $fornecedor->cnpj }}" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $fornecedor->telefone }}" required>
            </div>
            <button type="submit" class="btn btn-warning">
                <i class="bi bi-check-circle"></i> Atualizar
            </button>
            <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </form>
    </div>
</div>
@endsection
