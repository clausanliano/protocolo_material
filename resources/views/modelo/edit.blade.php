@extends('adminlte::page')

@section('title', 'Formulário: Modelo')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
            Formulário: Modelo
        </div>
        @if ($objeto->id == 0)
            <form action="{{ route('modelo.store')}}" method="post">
        @else
            <form action="{{ route('modelo.update', $objeto->id )}}" method="post">
            @method('PUT')
        @endif
            @csrf
            <div class="card-body">

                {{-- Nome --}}
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror"
                        name="nome" id="nome" value="{{ old('nome', $objeto->nome)}}">
                    @error('nome')
                        <div class="badge badge-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fabricante --}}
                <div class="form-group">
                    <label for="fabricante_id">Fabricante</label>
                    <select name="fabricante_id" id="fabricante_id"
                        class="form-control @error('fabricante_id') is-invalid @enderror"
                    >
                        <option value=""> - - Selecione uma opção - - </option>
                        @foreach ($fabricantes as $item)
                            @if (old('fabricante_id', $objeto->fabricante_id) == $item->id)
                                <option value="{{ $item->id}}" selected>{{ $item->nome}}</option>
                           @else
                                <option value="{{ $item->id}}">{{ $item->nome}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('fabricante_id')
                        <div class="badge badge-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tipo de Material --}}
                <div class="form-group">
                    <label for="tipo_material_id">Tipo de Material</label>
                    <select name="tipo_material_id" id="tipo_material_id"
                        class="form-control @error('tipo_material_id') is-invalid @enderror"
                    >
                        <option value=""> - - Selecione uma opção - - </option>
                        @foreach ($tipos_material as $item)
                            @if (old('tipo_material_id', $objeto->tipo_material_id) == $item->id)
                                <option value="{{ $item->id}}" selected>{{ $item->nome}}</option>
                           @else
                                <option value="{{ $item->id}}">{{ $item->nome}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('tipo_material_id')
                        <div class="badge badge-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- Observação --}}
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
                <a href="{{ route('modelo.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready(function () {
            $( '#fabricante_id' ).select2( {
                closeOnSelect: false,
                allowClear: true,
            } );
        });
    </script>
@stop
