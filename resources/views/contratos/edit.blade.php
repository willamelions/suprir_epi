@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <i class="bi bi-pencil"></i> Editar Contrato
    </div>
    <div class="card-body">
        <form action="{{ route('contratos.update', $contrato->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="obra_id" class="form-label">Obra</label>
                    <input type="number" class="form-control" id="obra_id" name="obra_id" value="{{ $contrato->obra_id }}" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="fornecedor_id" class="form-label">Fornecedor</label>
                    <input type="number" class="form-control" id="fornecedor_id" name="fornecedor_id" value="{{ $contrato->fornecedor_id }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="{{ $contrato->valor }}" required>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="data_inicio" class="form-label">Data de Início</label>
                    <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="{{ $contrato->data_inicio }}" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="data_fim" class="form-label">Data de Fim</label>
                    <input type="date" class="form-control" id="data_fim" name="data_fim" value="{{ $contrato->data_fim }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">
                <i class="bi bi-check-circle"></i> Atualizar
            </button>
            <a href="{{ route('contratos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </form>
    </div>
</div>
@endsection
