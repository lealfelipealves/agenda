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
        try {
            $mensagens = Mensagem::all();
            return response()->json(['mensagens' => $mensagens], 200);
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
            $data = $request->only(['contato_id', 'descricao']);

            if($data) {
                if(!Contato::find($data['contato_id'])) {
                    return response()->json(['message' => 'Contato a ser relacionado não existe.'], 404);
                }

                $mensagem = Mensagem::create($data);

                if($mensagem){
                    return response()->json(['data' => $mensagem],201);
                } else {
                    return response()->json(['message' => 'Erro ao criar a mensagem'],400);
                }
            } else {
                return response()->json(['message' => 'Dados inválidos.'],400);
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

            $mensagem = Mensagem::find($id);

            if($mensagem) {
                return response()->json([$mensagem], 200);
            } else {
                return response()->json([
                    'message'=>'A mensagem com id '.$id.' não existe'
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
            $data = $request->only(['contato_id', 'descricao']);

            if($data) {
                $mensagem = Mensagem::find($id);

                if($mensagem) {
                    $mensagem->update($data);
                    return response()->json(['data' => $mensagem],200);
                } else {
                    return response()->json([
                        'message' => 'A mensagem com id '.$id.' nao existe'
                    ],400);
                }
            } else {
                return response()->json(['message' => 'Dados invalidos'],400);
            }
        } catch (\Exception $e) {
            return response()->json('Ocorreu um erro no servidor', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if($id < 0) {
                return response()->json(['message' => 'ID menor que zero, por favor, informe um ID válido'],400);
            }

            $mensagem = Mensagem::find($id);

            if($mensagem) {
                $mensagem->delete();
                return response()->json([],204);
            } else {
                return response()->json([
                    'message'=>'A mensagem com id '.$id.' nao existe'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json('Ocorreu um erro no servidor', 500);
        }
    }
}
