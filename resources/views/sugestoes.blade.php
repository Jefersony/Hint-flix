<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sugestões') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Confira as sugestões de filmes para você:") }}
                    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                        <br>
                        <p>Lista de Filmes</p>
                        <br>
                        <div id="listaFilmes">
                            <ul>
                            @foreach ($filmes as $flm)
                                <li>
                                    <label>Título: </label>{{ $flm->titulo }} <br>
                                    <label>Ano de lançamento: </label>{{ $flm->anoLancamento }} <br>
                                    <label>Genero: </label>{{ $flm->genero }} <br>
                                    <label>Diretor: </label>{{ $flm->diretor }} <br>
                                    <label>Estúdio: </label>{{ $flm->estudio }} <br>
                                    <label>Elenco: </label>{{ $flm->elenco }} <br>
                                </li>
                                <br>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
