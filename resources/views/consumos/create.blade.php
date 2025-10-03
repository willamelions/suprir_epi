@extends('layouts.app')

@section('title', 'Novo Consumo')

@section('content')
<h1>Novo Consumo</h1>

<form action="{{ route('consumos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Obra</label>
        <select name="obra_id" class="form-control" required>
            <option value="">Selecione</option>
            @foreach($obras as $obra)
                <option value="{{ $obra->id }}">{{ $obra->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Item</label>
        <select name="item_id" class="form-control" required>
            <option value="">Selecione</option>
            @foreach($itens as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Quantidade</label>
        <input type="number" name="quantidade" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Responsável</label>
        <input type="text" name="responsavel" class="form-control">
    </div>

    <div class="mb-3">
        <label>CPF Funcionário</label>
        <input type="text" name="cpf_funcionario" class="form-control">
    </div>

    <div class="mb-3">
        <label>Data do Consumo</label>
        <input type="datetime-local" name="data_consumo" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('consumos.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
