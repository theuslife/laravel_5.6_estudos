<?php

namespace App\Http\Controllers\Loops;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpcoesController extends Controller
{
    public function mostrarOpcoes()
    {

        return view('loops\mostrar_opcoes');

    }

    public function opcoes($opcao)
    {

        return view('loops\opcoes', compact('opcao'));

    }

}
