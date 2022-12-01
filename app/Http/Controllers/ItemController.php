<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Material;
use App\Models\Recibo;

class ItemController extends Controller
{
    public function create(Recibo $recibo)
    {
        $objeto = new Item();
        $objeto->recibo_id = $recibo->id;

        $materiais_no_recibo = $objeto->recibo->itens->pluck('material_id')->all();
        $materiais = Material::whereNotIn('id', $materiais_no_recibo)->get();

        return view('item.edit')->with(compact('objeto', 'materiais'));
    }

    public function store(StoreItemRequest $request, Recibo $recibo)
    {
        $dados = $request->validated();
        $dados['recibo_id'] = $recibo->id;
        Item::create($dados);
        return redirect(route('recibo.show', $recibo))->with(  'mensagem', 'Registro CADASTRADO com sucesso!!!');
    }

    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item)
    {
        $objeto = $item;

        $materiais_no_recibo = $objeto->recibo->itens->pluck('material_id')->all();
        $materiais_no_recibo_exceto_do_item = array_filter($materiais_no_recibo, fn ($m) => $m != $item->material_id);
        $materiais = Material::whereNotIn('id', $materiais_no_recibo_exceto_do_item)->get();

        return view('item.edit')->with(compact('objeto', 'materiais'));
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    public function destroy(Item $item)
    {
        $recibo = $item->recibo;
        $item->delete();
        return redirect(route('recibo.show', $recibo))->with(  'mensagem', 'Registro EXCLUÍDO com sucesso!!!');
    }
}
