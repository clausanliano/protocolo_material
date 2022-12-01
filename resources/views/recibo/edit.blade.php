@extends('adminlte::page')

@section('title', 'Formulário: Recibo')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
            Formulário: Recibo
        </div>
        @if ($objeto->id == 0)
            <form action="{{ route('recibo.store')}}" method="post">
        @else
            <form action="{{ route('recibo.update', $objeto->id )}}" method="post">
            @method('PUT')
        @endif
            @csrf
            <div class="card-body">

                {{-- Recebedor --}}
                <div class="form-group">
                    <label for="recebedor_id">Recebedor</label>
                    <select name="recebedor_id" id="recebedor_id"
                        class="form-control @error('recebedor_id') is-invalid @enderror"
                    >
                        <option value=""> - - Selecione uma opção - - </option>
                        @foreach ($recebedores as $item)
                            @if (old('recebedor_id', $objeto->recebedor_id) == $item->id)
                                <option value="{{ $item->id}}" selected>{{ $item->name }} ({{ $item->email }})</option>
                           @else
                                <option value="{{ $item->id}}">{{ $item->name }} ({{ $item->email }})</option>
                            @endif
                        @endforeach
                    </select>
                    @error('fabricante_id')
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
                <a href="{{ route('recibo.index') }}" class="btn btn-danger">Cancelar</a>
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
