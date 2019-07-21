<?php

namespace App\Http\Controllers;

use App\Http\Requests\MensagensRequest as Request;
use App\Models\Contato;
use App\Models\Mensagem;

class MensagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Mensagem[]
     */
    public function index()
    {
        return Mensagem::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Contato::find($request->contato_id)) {
            return response()->json(['message' => 'Contato a ser relacionado não existe.'], 404);
        }

        $mensagem = Mensagem::create($request->all());

        if($mensagem){
            return response()->json(['data' => $mensagem],201);
        } else {
            return response()->json(['message' => 'Erro ao criar a mensagem'],400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  Mensagem  $mensagen
     * @return Mensagem
     */
    public function show(Mensagem $mensagen)
    {
        return $mensagen;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Mensagem  $mensagem
     * @return Mensagem
     */
    public function update(Request $request, Mensagem $mensagen)
    {
        $mensagen->update($request->all());
        return $mensagen;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Mensagem  $mensagem
     * @return Mensagem
     */
    public function destroy(Mensagem $mensagen)
    {
        $mensagen->delete();
        return $mensagen;
    }
}
