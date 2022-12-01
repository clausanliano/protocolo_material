@extends('adminlte::page')

@section('title', 'Formulário: Item')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
            Formulário: Item
        </div>
        @if ($objeto->id == 0)
            <form action="{{ route('item.store', $objeto->recibo)}}" method="post">
        @else
            <form action="{{ route('item.update', $objeto )}}" method="post">
            @method('PUT')
        @endif
            @csrf
            <div class="card-body">

                {{-- Material --}}
                <div class="form-group">
                    <label for="material_id">Material</label>
                    <select name="material_id" id="material_id"
                        class="form-control @error('material_id') is-invalid @enderror"
                    >
                        <option value=""> - - Selecione uma opção - - </option>
                        @foreach ($materiais as $item)
                            @if (old('material_id', $objeto->material_id) == $item->id)
                                <option value="{{ $item->id}}" selected>{{ $item->modelo->nome}} serial: {{ $item->serial}}</option>
                           @else
                                <option value="{{ $item->id}}">{{ $item->modelo->nome}} serial: {{ $item->serial}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('material_id')
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
                <a href="{{ route('recibo.show', $objeto->recibo ) }}" class="btn btn-danger">Cancelar</a>
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
