<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function createUsuario(Request $request) {
		$usuario = new Usuario;
		$usuario->cpf = $request->cpf;
		$usuario->nome = $request->nome;
		$usuario->data_nascimento = $request->data_nascimento;
		$usuario->save();

		return response()->json([
			"message" => "Usuario criado com sucesso!"
		], 201);
    }

	public function getUsuario($id) {
		if (Usuario::where('id', $id)->exists()) {
			$usuario = Usuario::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
			return response($usuario, 200);
		} else {
			return response()->json([
			"message" => "Usuario nao encontrado!"
			], 404);
		}
    }
}
