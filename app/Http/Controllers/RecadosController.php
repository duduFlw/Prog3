<?php

namespace App\Http\Controllers;

use App\Models\Recado;
use Illuminate\Http\Request;

// Criação do controle para criar as funções dos Recados

class RecadosController extends Controller
{
    // Função para mostrar os recados na página inicial
    public function index()
    {
        $recados = Recado::orderBy('id', 'desc')->get();

        return view('recados.index', ['recads' => $recados, 'pagina' => 'recados']);
    }

    // Função para criar novos recados
    public function create()
    {
        return view('recados.create', ['pagina' => 'recados']);
    }

    // Função para criar Salvar os recados no banco
    public function insert(Request $form)
    {
        $reca = new Recado();

        $reca->nome = $form->nome;
        $reca->comentario = $form->comentario;

        $reca->save();

        return redirect()->route('recados');
    }

    // Função para buscar os recados salvos no banco antes de edita-los
    public function edit(Recado $reca)
    {
        return view('recados.edit', ['reca' => $reca, 'pagina' => 'recados']);
    }

    // Função para subir as alterações dos recados no banco
    public function update(Request $form, Recado $reca)
    {
        $reca->nome = $form->nome;
        $reca->comentario = $form->comentario;

        $reca->save();

        return redirect()->route('recados');
    }

    // Função para mostrar uma página de confimação de exclusão dos recados
    public function remove(Recado $reca)
    {
        return view('recados.remove', ['reca' => $reca, 'pagina' => 'recados']);
    }

    // Função para excluir as informações do banco e retonar a página inicial
    public function delete(Recado $reca)
    {
        $reca->delete();

        return redirect()->route('recados');
    }

}
