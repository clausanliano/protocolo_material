@extends('adminlte::page')

@section('title', 'Formulário: Material')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
            Formulário: Material
        </div>
        @if ($objeto->id == 0)
            <form action="{{ route('material.store')}}" method="post">
        @else
            <form action="{{ route('material.update', $objeto->id )}}" method="post">
            @method('PUT')
        @endif
            @csrf
            <div class="card-body">

                {{-- Modelo --}}
                <div class="form-group">
                    <label for="modelo_id">Fabricante</label>
                    <select name="modelo_id" id="modelo_id"
                        class="form-control @error('modelo_id') is-invalid @enderror"
                    >
                        <option value=""> - - Selecione uma opção - - </option>
                        @foreach ($modelos as $item)
                            @if (old('modelo_id', $objeto->modelo_id) == $item->id)
                                <option value="{{ $item->id}}" selected>{{ $item->nome}}</option>
                           @else
                                <option value="{{ $item->id}}">{{ $item->nome}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('modelo_id')
                        <div class="badge badge-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- Serial --}}
                <div class="form-group">
                    <label for="serial">Serial</label>
                    <input type="text" class="form-control @error('serial') is-invalid @enderror"
                        name="serial" id="serial" value="{{ old('serial', $objeto->serial)}}">
                    @error('serial')
                        <div class="badge badge-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombo --}}
                <div class="form-group">
                    <label for="tombo">Tombo</label>
                    <input type="text" class="form-control @error('tombo') is-invalid @enderror"
                        name="tombo" id="tombo" value="{{ old('tombo', $objeto->tombo)}}">
                    @error('tombo')
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
                <a href="{{ route('material.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready(function () {
            $( '#modelo_id' ).select2( {
                closeOnSelect: false,
                allowClear: true,
            } );
        });
    </script>
@stop
