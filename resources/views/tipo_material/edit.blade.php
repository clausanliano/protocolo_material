@extends('adminlte::page')

@section('title', 'Formulário: Tipo de Material')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
            Formulário: Tipo de Material
        </div>
        @if ($objeto->id == 0)
            <form action="{{ route('tipo_material.store')}}" method="post">
        @else
            <form action="{{ route('tipo_material.update', $objeto->id )}}" method="post">
            @method('PUT')
        @endif
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror"
                        name="nome" id="nome" value="{{ old('nome', $objeto->nome)}}">
                    @error('nome')
                        <div class="badge badge-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="observacao">Observação</label>
                    <textarea class="form-control @error('observacao') is-invalid @enderror"
                        name="observacao" id="observacao" cols="30" rows="5">{{ old('observacao', $objeto->observacao)}}</textarea>
                    @error('observacao')
                        <div class="badge badge-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Salvar</button>
                <a href="{{ route('tipo_material.index') }}" class="btn btn-danger">Cancelar</a>
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
