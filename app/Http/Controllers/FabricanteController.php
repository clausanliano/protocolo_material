<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use App\Http\Requests\StoreFabricanteRequest;
use App\Http\Requests\UpdateFabricanteRequest;

class FabricanteController extends Controller
{

    public function index()
    {
        $lista = Fabricante::all();
        return view('fabricante.index')->with(compact('lista'));
    }

    public function create()
    {
        $objeto = new Fabricante();
        return view('fabricante.edit')->with(compact('objeto'));
    }

    public function store(StoreFabricanteRequest $request)
    {
        Fabricante::create($request->validated());
        return redirect(route('fabricante.index'))->with(  'mensagem', 'Registro CADASTRADO com sucesso!!!');
    }

    public function show(Fabricante $fabricante)
    {
        $objeto = $fabricante;
        return view('fabricante.show')->with(compact('objeto'));
    }

    public function edit(Fabricante $fabricante)
    {
        $objeto = $fabricante;
        return view('fabricante.edit')->with(compact('objeto'));
    }

    public function update(UpdateFabricanteRequest $request, Fabricante $fabricante)
    {
        $objeto = $fabricante->update($request->validated());
        return redirect(route('fabricante.index'))->with(  'mensagem', 'Registro ALTERADO com sucesso!!!');
    }

    public function destroy(Fabricante $fabricante)
    {
        $fabricante->delete();
        return redirect(route('fabricante.index'))->with(  'mensagem', 'Registro EXCLUÍDO com sucesso!!!');
    }
}
