@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content')
    <div class="card my-3">
        <div class="card-header bg-secondary">
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
                            <td>-</td>
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
            Inserir
        </div>
    </div>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@stop
