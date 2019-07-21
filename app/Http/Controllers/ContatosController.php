<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatosRequest as Request;
use App\Models\Contato;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Contato[]
     */
    public function index()
    {
        try {
            $contatos = Contato::with('mensagens')->get();
            return response()->json(['contatos' => $contatos], 200);
        } catch (\Exception $e) {
            return response()->json('Ocorreu um erro no servidor', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->only(['nome', 'sobrenome', 'email', 'telefone']);

            if($data) {
                $contato = Contato::create($data);
                if($contato) {
                    return response()->json(['data' => $contato],201);
                } else {
                    return response()->json(['message' => 'Erro ao criar contato'],400);
                }
            } else {
                return response()->json(['message' => 'Dados inválidos'],400);
            }
        } catch (\Exception $e) {
            return response()->json('Ocorreu um erro no servidor', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if($id < 0) {
                return response()->json(['message' => 'ID menor que zero, por favor, informe um ID válido'],400);
            }

            $contato = Contato::with('mensagens')->where('id', $id)->get();

            if($contato) {
                return response()->json([$contato], 200);
            } else {
                return response()->json([
                    'message'=>'O contato com id '.$id.' não existe'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json('Ocorreu um erro no servidor', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $data = $request->only(['nome', 'sobrenome', 'email', 'telefone']);

            if($data) {
                $contato = Contato::find($id);

                if($contato) {
                    $contato->update($data);
                    return response()->json(['data' => $contato],200);
                } else {
                    return response()->json([
                        'message' => 'O contato com id '.$id.' nao existe'
                    ],400);
                }
            } else {
                return response()->json(['message' => 'Dados inválidos'],400);
            }
        } catch (\Exception $e) {
            return response()->json('Ocorreu um erro no servidor', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if($id < 0) {
                return response()->json(['message' => 'ID menor que zero, por favor, informe um ID válido'],400);
            }

            $contato = Contato::find($id);

            if($contato) {
                $contato->delete();
                return response()->json([],204);
            } else {
                return response()->json([
                    'message'=>'O contato com id '.$id.' nao existe'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json('Ocorreu um erro no servidor', 500);
        }
    }
}
