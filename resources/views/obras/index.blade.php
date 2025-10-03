@extends('layouts.app')

@section('title', 'Obras')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-building"></i> Obras</h2>
    <a href="{{ route('obras.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Nova Obra
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if($obras->isEmpty())
            <div class="alert alert-warning">Nenhuma obra cadastrada.</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Responsável</th>
                            <th>Localização</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obras as $obra)
                        <tr>
                            <td>{{ $obra->id }}</td>
                            <td>{{ $obra->nome }}</td>
                            <td>{{ $obra->responsavel }}</td>
                            <td>{{ $obra->localizacao }}</td>
                            <td>
                                <a href="{{ route('obras.show', $obra) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('obras.edit', $obra) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('obras.destroy', $obra) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">
                                        <i class="fas fa-trash"></i>
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
