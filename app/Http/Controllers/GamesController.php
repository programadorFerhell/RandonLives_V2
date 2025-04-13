<?php

namespace App\Http\Controllers;


use App\Models\Games;
use Illuminate\Http\Request;
use Exception;

class GamesController extends Controller
{
    public function cadastrarGame(Request $request) {
        try {
            // dd($request->all());
            $game = Games::create($request->only(['nome', 'genero_id']));
            return response()->json(['success'=>'Jogo cadastrado com Sucesso','info' => $game], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao cadastrar game', 'message' => $e->getMessage()], 500);
        }
    }

    public function buscarGame($id) {
        try {
            $game = Games::findOrFail($id);
            return response()->json($game);
        } catch (Exception $e) {
            return response()->json(['error' => 'Game não encontrado', 'message' => $e->getMessage()], 404);
        }
    }

    public function atualizarGame(Request $request,$id) {
        try {
            $game = Games::findOrFail($id);
            $game->update($request->only(['nome', 'genero']));
            return response()->json($game);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar game', 'message' => $e->getMessage()], 500);
        }
    }

    public function excluirGame($id) {
        try {
            $game = Games::findOrFail($id);
            $game->delete();
            return response()->json(['message' => 'Game excluído com sucesso.']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao excluir game', 'message' => $e->getMessage()], 500);
        }
    }

    public function listarGames() {
        try {
            $games = Games::with('genero')->get();
            return response()->json($games);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao listar games', 'message' => $e->getMessage()], 500);
        }
    }


    public function getRandom()
    {
        try {
            $randomGame = Games::inRandomOrder()->first();

            if (!$randomGame) {
                throw new \Exception("Nenhum jogo encontrado");
            }

            return $randomGame->id;
        } catch (Exception $e) {
            return response()->json(["error" => "Erro ao selecionar jogo aleatório", "message" => $e->getMessage()], 400);
        }
    }

    public function getNomeJogoRandom()
    {
        try {
            $randomId = $this->getRandom();
            if ($randomId instanceof \Illuminate\Http\JsonResponse) {
                return $randomId;
            }

            $game = Games::find($randomId);

            if (!$game) {
                throw new Exception("Jogo não encontrado");
            }

            return response()->json(["Jogo escolhido para a Live" => $game->nome]);
        } catch (Exception $e) {
            return response()->json(["error" => "Erro ao buscar nome do jogo aleatório", "message" => $e->getMessage()], 400);
        }
    }

}
