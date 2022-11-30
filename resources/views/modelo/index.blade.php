@extends('adminlte::page')

@section('title', 'Modelos de Material')

@section('content')
<div class="py-2">
    @if (session('mensagem'))
        <div class="alert alert-success">{{ session('mensagem') }}</div>
    @endif
    <div class="card card-dark">
        <div class="card-header">
            Modelos de Material
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo de Material</th>
                        <th>Fabricante</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lista as $item)
                        <tr>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->tipo_material->nome }}</td>
                            <td>{{ $item->fabricante->nome }}</td>
                            <td width='30%'>
                                <div class="form-inline">
                                    <a href="{{ route('modelo.show', $item->id) }}" class="btn btn-info mx-1" >Mostrar</a>
                                    <a href="{{ route('modelo.edit', $item->id) }}" class="btn btn-warning mx-1" >Editar</a>
                                    <form action="{{ route('modelo.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mx-1" type="submit">Apagar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Não há registros cadastrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('modelo.create') }}" class="btn btn-success">Inserir</a>
        </div>
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
