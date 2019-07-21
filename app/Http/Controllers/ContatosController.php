<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatosRequest as Request;
use App\Models\Contato;

class ContatosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Contato
     */
    public function store(Request $request)
    {
        return Contato::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Contato  $contato
     * @return Contato
     */
    public function update(Request $request, Contato $contato)
    {
        $contato->update($request->all());
        return $contato;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Contato  $contato
     * @return Contato
     */
    public function destroy(Request $request, Contato $contato)
    {
        $contato->delete();
        return $contato;
    }
}
