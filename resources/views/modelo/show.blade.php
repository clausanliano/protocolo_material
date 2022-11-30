@extends('adminlte::page')

@section('title', 'Formulário: Modelo de Material')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
            Formulário: Modelo de Material
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $objeto->nome}}" disabled>
            </div>

            <div class="form-group">
                <label for="fabricante">Fabricante</label>
                <input type="text" class="form-control" name="fabricante" id="fabricante" value="{{ $objeto->fabricante->nome}}" disabled>
            </div>

            <div class="form-group">
                <label for="tipo_material">Tipo de Material</label>
                <input type="text" class="form-control" name="tipo_material" id="tipo_material" value="{{ $objeto->tipo_material->nome}}" disabled>
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
@stop


@section('js')
@stop
