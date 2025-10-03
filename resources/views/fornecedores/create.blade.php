@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <i class="bi bi-plus-circle"></i> Novo Fornecedor
    </div>
    <div class="card-body">
        <form action="{{ route('fornecedores.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Salvar
            </button>
            <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </form>
    </div>
</div>
@endsection
