@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content')
<div class="py-2">
    @if (session('mensagem'))
        <div class="alert alert-success">{{ session('mensagem') }}</div>
    @endif
    <div class="card card-dark">
        <div class="card-header">
            Fabricantes
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lista as $item)
                        <tr>
                            <td>{{ $item->nome }}</td>
                            <td width='30%'>
                                <div class="form-inline">
                                    <a href="{{ route('fabricante.show', $item->id) }}" class="btn btn-info mx-1" >Mostrar</a>
                                    <a href="{{ route('fabricante.edit', $item->id) }}" class="btn btn-warning mx-1" >Editar</a>
                                    <form action="{{ route('fabricante.destroy', $item->id)}}" method="post">
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
            <a href="{{ route('fabricante.create') }}" class="btn btn-success">Inserir</a>
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
