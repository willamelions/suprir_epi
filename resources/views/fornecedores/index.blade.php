@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-truck"></i> Fornecedores</h2>
    <a href="{{ route('fornecedores.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Novo Fornecedor
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if($fornecedores->isEmpty())
            <div class="alert alert-warning">
                Nenhum fornecedor cadastrado.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CNPJ</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->id }}</td>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->cnpj }}</td>
                            <td>{{ $fornecedor->telefone }}</td>
                            <td>
                                <a href="{{ route('fornecedores.show', $fornecedor->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este fornecedor?')">
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
