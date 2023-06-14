<head>
    <title>Sugestões</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo asset('css/homepage.css')?>" type="text/css">
</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>
                    </p>
                    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                        <p>{{ __("Preencha qualquer um dos campos de dados de acordo com o que você deseja assistir, depois clique no botão -buscar- para receber sugestões de filmes:") }}</p>   
                        <br><br>
                        <form method="GET" action="{{ route( 'trazer-filmes' ) }}">
                            @csrf
                            @method('get')
                            <label>Título: </label>
                            <input type="text" name="titulo" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                placeholder="{{ __('Lembra do título do filme que você procura?') }}"> <br>
                            <label>Ano Inicial: </label>
                            <input type="text" name="anoInicial" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                placeholder="{{ __('Procurar filmes a partir de qual ano?') }}"> <br>
                            <label>Ano Final: </label>
                            <input type="text" name="anoFinal" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                placeholder="{{ __('Não te interessam filmes a partir de qual ano?') }}"> <br>
                            <label>Gênero: </label>
                            <input type="text" name="genero" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                placeholder="{{ __('Que tipo de filme você procura?') }}"> <br>
                            <label>Estúdio: </label>
                            <input type="text" name="estudio" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                placeholder="{{ __('Algum distribuidor de filmes preferido?') }}"> <br>
                            <label>Diretor: </label>
                            <input type="text" name="diretor" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                placeholder="{{ __('Você procura obras de um diretor específico?') }}"> <br>
                            <label>Elenco: </label>
                            <br>
                            <textarea 
                                name="elenco" 
                                placeholder="{{ __('Digite os nomes dos atores separando-os por vírgula.') }}"
                                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                            <br>
                            <x-input-error :messages="$errors->get('message')"
                                class="mt-2" />
                            <x-primary-button class="mt-4">{{ __('Buscar') }} </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
