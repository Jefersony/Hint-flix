<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
