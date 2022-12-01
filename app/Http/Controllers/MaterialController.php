<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Modelo;

class MaterialController extends Controller
{
    public function index()
    {
        $lista = Material::all();
        return view('material.index')->with(compact('lista'));
    }

    public function create()
    {
        $objeto = new Material();
        $modelos = Modelo::all();
        return view('material.edit')->with(compact('objeto', 'modelos'));
    }

    public function store(StoreMaterialRequest $request)
    {
        Material::create($request->validated());
        return redirect(route('material.index'))->with(  'mensagem', 'Registro CADASTRADO com sucesso!!!');
    }

    public function show(Material $material)
    {
        $objeto = $material;
        return view('material.show')->with(compact('objeto'));
    }

    public function edit(Material $material)
    {
        $objeto = $material;
        $modelos = Modelo::all();
        return view('material.edit')->with(compact('objeto', 'modelos'));
    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $objeto = $material->update($request->validated());
        return redirect(route('material.index'))->with(  'mensagem', 'Registro ALTERADO com sucesso!!!');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect(route('material.index'))->with(  'mensagem', 'Registro EXCLUÍDO com sucesso!!!');
    }
}
