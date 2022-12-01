@extends('adminlte::page')

@section('title', 'Formulário: Material')

@section('content')
<div class="py-2">
    <div class="card">
        <div class="card-header bg-secondary">
            Formulário: Material
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="serial">Serial</label>
                <input type="text" class="form-control" name="serial" id="serial" value="{{ $objeto->serial}}" disabled>
            </div>

            <div class="form-group">
                <label for="tombo">Nº de Tombamento</label>
                <input type="text" class="form-control" name="tombo" id="tombo" value="{{ $objeto->tombo}}" disabled>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo do Material</label>
                <input type="text" class="form-control" name="modelo" id="modelo" value="{{ $objeto->modelo->nome}}" disabled>
            </div>


            <div class="form-group">
                <label for="tipo_material">Tipo de Material</label>
                <input type="text" class="form-control" name="tipo_material" id="tipo_material" value="{{ $objeto->modelo->tipo_material->nome}}" disabled>
            </div>


            <div class="form-group">
                <label for="fabricante">Fabricante</label>
                <input type="text" class="form-control" name="fabricante" id="fabricante" value="{{ $objeto->modelo->fabricante->nome}}" disabled>
            </div>

            <div class="form-group">
                <label for="observacao">Observação</label>
                <textarea class="form-control" name="observacao" id="observacao" cols="30" rows="5" disabled> {{ $objeto->observacao }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('modelo.index') }}" class="btn btn-primary">Voltar a Lista</a>
        </div>
    </div>
</div>
@stop


@section('js')
@stop
