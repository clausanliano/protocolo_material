<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Http\Requests\StoreModeloRequest;
use App\Http\Requests\UpdateModeloRequest;
use App\Models\Fabricante;
use App\Models\TipoMaterial;

class ModeloController extends Controller
{
    public function index()
    {
        $lista = Modelo::all();
        return view('modelo.index')->with(compact('lista'));
    }

    public function create()
    {
        $objeto = new Modelo();
        $fabricantes = Fabricante::all();
        $tipos_material = TipoMaterial::all();
        return view('modelo.edit')->with(compact('objeto', 'fabricantes', 'tipos_material'));
    }

    public function store(StoreModeloRequest $request)
    {
        Modelo::create($request->validated());
        return redirect(route('modelo.index'))->with(  'mensagem', 'Registro CADASTRADO com sucesso!!!');
    }

    public function show(Modelo $modelo)
    {
        $objeto = $modelo;
        return view('modelo.show')->with(compact('objeto'));
    }

    public function edit(Modelo $modelo)
    {
        $objeto = $modelo;
        $fabricantes = Fabricante::all();
        $tipos_material = TipoMaterial::all();
        return view('modelo.edit')->with(compact('objeto', 'fabricantes', 'tipos_material'));
    }

    public function update(UpdateModeloRequest $request, Modelo $modelo)
    {
        $objeto = $modelo->update($request->validated());
        return redirect(route('modelo.index'))->with(  'mensagem', 'Registro ALTERADO com sucesso!!!');
    }

    public function destroy(Modelo $modelo)
    {
        $modelo->delete();
        return redirect(route('modelo.index'))->with(  'mensagem', 'Registro EXCLUÍDO com sucesso!!!');
    }
}
