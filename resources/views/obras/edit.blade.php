@extends('layouts.app')

@section('title', 'Editar Obra')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <i class="fas fa-edit"></i> Editar Obra
    </div>
    <div class="card-body">
        <form action="{{ route('obras.update', $obra) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Obra</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $obra->nome }}" required>
            </div>
            <div class="mb-3">
                <label for="responsavel" class="form-label">Responsável</label>
                <input type="text" class="form-control" id="responsavel" name="responsavel" value="{{ $obra->responsavel }}" required>
            </div>
            <div class="mb-3">
                <label for="localizacao" class="form-label">Localização</label>
                <input type="text" class="form-control" id="localizacao" name="localizacao" value="{{ $obra->localizacao }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Atualizar</button>
            <a href="{{ route('obras.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
