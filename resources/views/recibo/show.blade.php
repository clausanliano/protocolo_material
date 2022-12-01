@extends('adminlte::page')

@section('title', 'Formulário: Modelo de Material')

@section('content')
<div class="py-2">
    <div class="card">
        <div class="card-header bg-secondary">
            Formulário: Recibo
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" class="form-control" name="numero" id="numero" value="{{ $objeto->id}}" disabled>
            </div>
            <div class="form-group">
                <label for="entregador">Origem</label>
                <input type="text" class="form-control" name="entregador" id="entregador" value="{{ $objeto->entregador->name}}" disabled>
            </div>

            <div class="form-group">
                <label for="recebedor">Destino</label>
                <input type="text" class="form-control" name="recebedor" id="recebedor" value="{{ $objeto->recebedor->name}}" disabled>
            </div>

            <div class="form-group">
                <label for="created_at">Data Hora</label>
                <input type="text" class="form-control" name="created_at" id="created_at" value="{{ $objeto->created_at->format('d/m/Y H:i')}}" disabled>
            </div>

            <div class="form-group">
                <label for="observacao">Observação</label>
                <textarea class="form-control" name="observacao" id="observacao" cols="30" rows="5" disabled> {{ $objeto->observacao }}</textarea>
            </div>
        </div>


        <div class="card-body bg-secondary">
            Itens do Recibo
        </div>

        <div class="card-body">
            Lista de itens
        </div>


        <div class="card-footer">
            <a href="{{ route('recibo.index') }}" class="btn btn-primary">Voltar a Lista</a>
            <a href="{{ route('item.create') }}" class="btn btn-success">Inserir Item</a>
        </div>
    </div>
</div>
@stop


@section('js')
@stop
