@extends('layouts.app')

@section('title', 'Consumos')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Consumos</h1>
    <a href="{{ route('consumos.create') }}" class="btn btn-primary">+ Novo Consumo</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Obra</th>
            <th>Item</th>
            <th>Qtd</th>
            <th>Responsável</th>
            <th>CPF</th>
            <th>Data</th>
            <th width="200">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($consumos as $consumo)
            <tr>
                <td>{{ $consumo->id }}</td>
                <td>{{ $consumo->obra->nome ?? '—' }}</td>
                <td>{{ $consumo->item->nome ?? '—' }}</td>
                <td>{{ $consumo->quantidade }}</td>
                <td>{{ $consumo->responsavel }}</td>
                <td>{{ $consumo->cpf_funcionario }}</td>
                <td>{{ $consumo->data_consumo ? $consumo->data_consumo->format('d/m/Y H:i') : '—' }}</td>
                <td>
                    <a href="{{ route('consumos.edit', $consumo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('consumos.destroy', $consumo) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
