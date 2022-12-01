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

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Tombo</th>
                        <th>Tipo de Material</th>
                        <th>Modelo</th>
                        <th>Fabricante</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($objeto->itens as $item)
                        <tr>
                            <td>{{ $item->material->serial }}</td>
                            <td>{{ $item->material->tombo }}</td>
                            <td>{{ $item->material->modelo->tipo_material->nome }}</td>
                            <td>{{ $item->material->modelo->nome }}</td>
                            <td>{{ $item->material->modelo->fabricante->nome }}</td>
                            <td width='30%'>
                                <div class="form-inline">
                                    <a href="{{ route('recibo.show', $item->id) }}" class="btn btn-info mx-1" >Mostrar</a>
                                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning mx-1" >Editar</a>
                                    <form action="{{ route('item.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mx-1" type="submit">Apagar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Não há registros cadastrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>










        </div>


        <div class="card-footer">
            <a href="{{ route('recibo.index') }}" class="btn btn-primary">Voltar a Lista</a>
            <a href="{{ route('item.create', $objeto) }}" class="btn btn-success">Inserir Item</a>
        </div>
    </div>
</div>
@stop


@section('js')
@stop
