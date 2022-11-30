<?php

namespace App\Http\Controllers;

use App\Models\TipoMaterial;
use App\Http\Requests\StoreTipoMaterialRequest;
use App\Http\Requests\UpdateTipoMaterialRequest;

class TipoMaterialController extends Controller
{

    public function index()
    {
        $lista = TipoMaterial::all();
        return view('tipo_material.index')->with(compact('lista'));
    }

    public function create()
    {
        $objeto = new TipoMaterial();
        return view('tipo_material.edit')->with(compact('objeto'));
    }

    public function store(StoreTipoMaterialRequest $request)
    {
        TipoMaterial::create($request->validated());
        return redirect(route('tipo_material.index'))->with(  'mensagem', 'Registro CADASTRADO com sucesso!!!');
    }

    public function show(TipoMaterial $tipoMaterial)
    {
        $objeto = $tipoMaterial;
        return view('tipo_material.show')->with(compact('objeto'));
    }

    public function edit(TipoMaterial $tipoMaterial)
    {
        $objeto = $tipoMaterial;
        return view('tipo_material.edit')->with(compact('objeto'));
    }

    public function update(UpdateTipoMaterialRequest $request, TipoMaterial $tipoMaterial)
    {
        $objeto = $tipoMaterial->update($request->validated());
        return redirect(route('tipo_material.index'))->with(  'mensagem', 'Registro ALTERADO com sucesso!!!');
    }

    public function destroy(TipoMaterial $tipoMaterial)
    {
        $tipoMaterial->delete();
        return redirect(route('tipo_material.index'))->with(  'mensagem', 'Registro EXCLUÍDO com sucesso!!!');
    }
}
