<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class FilmeController extends Controller
{
    /**
     * Retorna uma página com sugestões de filmes
     */
    public function getFilmes( Request $request ): View
    {
        $titulo = $request->input('titulo');
        $genero = $request->input('genero');
        $estudio = $request->input('estudio');
        $diretor = $request->input('diretor');
        $elenco = $request->input('elenco');
        $anoInicial = $request->input('anoInicial');
        $anoFinal = $request->input('anoFinal');

        // Verifica se apenas um dos campos relacionados ao 
        // intervalo de busca para ano de lançamento está preenchido
        // ------------------------------------------------(
        if ( $anoInicial == '' and $anoFinal != '' ){
            $verificacao = $request->validate([
                'anoInicial' => ["required"],
            ]);
            return view('sugestoes', [$verificacao]);
        }
        if ( $anoInicial != '' and $anoFinal == '' ){
            $verificacao = $request->validate([
                'anoFinal' => ["required"],
            ]);
            return view('sugestoes', [$verificacao]);
        } // ------------------------- ) Fim da verificação 

        $filmes;

        // Se os dois campos relacionados ao ano estiverem preenchidos, eles 
        // devem ter valores numéricos e inteiros para serem usados no comando SQL
        if ( $anoInicial != '' and $anoFinal != '' ){
            $request->validate([
                'anoInicial' => ["integer"],
                'anoFinal' => ["integer"],
            ]);
            $comandoSQL = "select * from filmes where "                 . 
                "titulo = '"         . $titulo              . "' or "   .
                "genero = '"         . $genero              . "' or "   .
                "diretor = '"        . $diretor             . "' or "   .
                "estudio = '"        . $estudio             . "' or "   .
                "elenco = '"         . $elenco              . "' or "   .
                "anoLancamento >= "  . (string) $anoInicial . " and "   .
                "anoLancamento <= "  . (string) $anoFinal
            ; // Fecha a string de comando SQL

            $filmes = DB::select( $comandoSQL );

        // Esse é o caso em que os dois campos relativos ao ano de lançamento estão vazios
        }else{
            $anoInicial = 0;
            $anoFinal = 0;
            $comandoSQL = "select * from filmes where " . 
                "titulo = '"        . $titulo       . "' or " .
                "genero = '"        . $genero       . "' or " .
                "diretor = '"       . $diretor      . "' or " .
                "estudio = '"       . $estudio      . "' or " .
                "elenco = '"        . $elenco       . "'"
            ; // Fecha string do comando SQL

            $filmes = DB::select($comandoSQL);
        }

        return view('sugestoes', ['filmes' => $filmes] );
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
        $request->validate([
            'titulo'        => ['required'],
            'anoLancamento' => ['required', 'integer'],
            'genero'        => ['required'],
            'estudio'       => ['required'],
            'diretor'       => ['required'],
            'elenco'        => ['required'],
        ]);
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
