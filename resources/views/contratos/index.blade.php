@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-file-earmark-text"></i> Contratos</h2>
    <a href="{{ route('contratos.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Novo Contrato
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if($contratos->isEmpty())
            <div class="alert alert-warning">
                Nenhum contrato cadastrado.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Obra</th>
                            <th>Fornecedor</th>
                            <th>Valor</th>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contratos as $contrato)
                        <tr>
                            <td>{{ $contrato->id }}</td>
                            <td>{{ $contrato->obra_id }}</td>
                            <td>{{ $contrato->fornecedor_id }}</td>
                            <td>R$ {{ number_format($contrato->valor, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($contrato->data_inicio)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($contrato->data_fim)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('contratos.show', $contrato->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('contratos.destroy', $contrato->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este contrato?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
