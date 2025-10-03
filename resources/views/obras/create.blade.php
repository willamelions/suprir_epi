@extends('layouts.app')

@section('title', 'Nova Obra')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <i class="fas fa-plus"></i> Cadastrar Nova Obra
    </div>
    <div class="card-body">
        <form action="{{ route('obras.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Obra</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="responsavel" class="form-label">Responsável</label>
                <input type="text" class="form-control" id="responsavel" name="responsavel" required>
            </div>
            <div class="mb-3">
                <label for="localizacao" class="form-label">Localização</label>
                <input type="text" class="form-control" id="localizacao" name="localizacao" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
            <a href="{{ route('obras.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
