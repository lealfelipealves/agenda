<?php

namespace App\Http\Controllers;

use App\Http\Requests\MensagensRequest as Request;
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
     * @return Mensagem
     */
    public function store(Request $request)
    {
        return Mensagem::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Mensagem  $mensagem
     * @return Mensagem
     */
    public function show(Mensagem $mensagem)
    {
        return $mensagem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Mensagem  $mensagem
     * @return Mensagem
     */
    public function update(Request $request, Mensagem $mensagem)
    {
        $mensagem->update($request->all());
        return $mensagem;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Mensagem  $mensagem
     * @return Mensagem
     */
    public function destroy(Request $request, Mensagem $mensagem)
    {
        $mensagem->delete();
        return $mensagem;
    }
}
