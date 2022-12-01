<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Http\Requests\StoreReciboRequest;
use App\Http\Requests\UpdateReciboRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReciboController extends Controller
{
    public function index()
    {
        $lista = Recibo::where('entregador_id', Auth()->user()->id)->orWhere('recebedor_id', Auth()->user()->id)->get();
        return view('recibo.index')->with(compact('lista'));
    }

    public function create()
    {
        $objeto = new Recibo();
        $recebedores = User::where('id', '<>', Auth()->user()->id)->get();
        return view('recibo.edit')->with(compact('objeto', 'recebedores'));
    }

    public function store(StoreReciboRequest $request)
    {
        $dados = $request->validated();
        $dados['entregador_id'] = Auth()->user()->id;
        Recibo::create($dados);
        return redirect(route('recibo.index'))->with(  'mensagem', 'Registro CADASTRADO com sucesso!!!');
    }

    public function show(Recibo $recibo)
    {
        $objeto = $recibo;
        return view('recibo.show')->with(compact('objeto'));
    }

    public function edit(Recibo $recibo)
    {
        $objeto = $recibo;
        $recebedores = User::where('id', '<>', Auth()->user()->id)->get();
        return view('recibo.edit')->with(compact('objeto', 'recebedores'));
    }


    public function update(UpdateReciboRequest $request, Recibo $recibo)
    {
        $dados = $request->validated();
        $dados['entregador_id'] = Auth()->user()->id;
        $recibo->update($dados);
        return redirect(route('recibo.index'))->with(  'mensagem', 'Registro CADASTRADO com sucesso!!!');
    }


    public function destroy(Recibo $recibo)
    {
        $recibo->delete();
        return redirect(route('recibo.index'))->with(  'mensagem', 'Registro EXCLUÍDO com sucesso!!!');
    }
}
