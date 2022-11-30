@extends('adminlte::page')

@section('title', 'Formulário: Fabricante')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
            Formulário: Fabricante
        </div>
        @if ($objeto->id == 0)
            <form action="{{ route('fabricante.store')}}" method="post">
        @else
            <form action="{{ route('fabricante.update', $objeto->id )}}" method="post">
            @method('PUT')
        @endif
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome', $objeto->nome)}}">
                </div>
                <div class="form-group">
                    <label for="observacao">Observação</label>
                    <textarea class="form-control" name="observacao" id="observacao" cols="30" rows="5">{{ old('observacao', $objeto->observacao)}}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Salvar</button>
                <a href="{{ route('fabricante.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
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
