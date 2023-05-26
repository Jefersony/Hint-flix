<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getFilmes( Request $request ): View
    {
        $titulo = $request->input('titulo');
        $anoInicial = $request->input('anoInicial');
        $anoFinal = $request->input('anoFinal');
        $genero = $request->input('genero');
        $estudio = $request->input('estudio');
        $diretor = $request->input('diretor');
        $comandoSQL = "select * from filmes where " . 
            "titulo = '"        . $titulo       . "' or " .
            "anoLancamento = "  . (string) $anoInicial   . " or "  .
            "genero = '"        . $genero       . "' or " .
            "diretor = '"       . $diretor      . "' or " .
            "estudio = '"       . $estudio      . "'"
        ;
        $filmes = DB::select($comandoSQL);
        return view('dashboard', ['filmes' => $filmes] );
    }

    /**
     * Abre a página do formulário para a busca de filmes.
     */
    public function exibirFormulario(): View
    {
        // Conjunto vazio de filmes para ser passado ao template
        // e evitar uma NullException
        $filmes = DB::select("select * from filmes where titulo = 'NENHUM'");
        return view('dashboard', ['filmes' => $filmes ]);
    }

    /**
     * Salva um novo filme, cadastrado pelo template HTML, 
     * no banco de dados do sistema.
     */
    public function store(Request $request): RedirectResponse
    {
        $filme = new Filme();
        $filme->titulo = $request->input('titulo');
        $filme->anoLancamento = $request->input('anoLancamento');
        $filme->genero = $request->input('genero');
        $filme->estudio = $request->input('estudio');
        $filme->diretor = $request->input('diretor');
        $filme->elenco = $request->input('elenco');
        $filme->save();
        return redirect( route('cadastrar-filme') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Filme $filme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filme $filme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filme $filme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filme $filme)
    {
        //
    }
}
