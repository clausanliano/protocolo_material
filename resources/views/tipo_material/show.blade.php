@extends('adminlte::page')

@section('title', 'Formulário: Tipos de Material')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
            Formulário: Tipos de Material
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $objeto->nome}}" disabled>
            </div>
            <div class="form-group">
                <label for="observacao">Observação</label>
                <textarea class="form-control" name="observacao" id="observacao" cols="30" rows="5" disabled> {{ $objeto->observacao }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('tipo_material.index') }}" class="btn btn-primary">Voltar a Lista</a>
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json',
                },
            });
        });
    </script>
@stop
