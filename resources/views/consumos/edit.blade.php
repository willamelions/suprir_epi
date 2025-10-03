@extends('layouts.app')

@section('title', 'Editar Consumo')

@section('content')
<h1>Editar Consumo</h1>

<form action="{{ route('consumos.update', $consumo) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Obra</label>
        <select name="obra_id" class="form-control" required>
            @foreach($obras as $obra)
                <option value="{{ $obra->id }}" @if($consumo->obra_id == $obra->id) selected @endif>
                    {{ $obra->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Item</label>
        <select name="item_id" class="form-control" required>
            @foreach($itens as $item)
                <option value="{{ $item->id }}" @if($consumo->item_id == $item->id) selected @endif>
                    {{ $item->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Quantidade</label>
        <input type="number" name="quantidade" class="form-control" value="{{ $consumo->quantidade }}" required>
    </div>

    <div class="mb-3">
        <label>Responsável</label>
        <input type="text" name="responsavel" class="form-control" value="{{ $consumo->responsavel }}">
    </div>

    <div class="mb-3">
        <label>CPF Funcionário</label>
        <input type="text" name="cpf_funcionario" class="form-control" value="{{ $consumo->cpf_funcionario }}">
    </div>

    <div class="mb-3">
        <label>Data do Consumo</label>
        <input type="datetime-local" name="data_consumo" class="form-control"
               value="{{ $consumo->data_consumo ? $consumo->data_consumo->format('Y-m-d\TH:i') : '' }}">
    </div>

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('consumos.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
