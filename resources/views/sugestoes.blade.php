<head>
    <title>Sugestões</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo asset('css/homepage.css')?>" type="text/css">
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sugestões') }}
        </h2>
    </x-slot>

    <!-- Carrossel -->
    <section class="carousels-films">
        <div class="section-title mb-3 mt-3">
            <h3>Confira as sugestões de filmes para você</h3>
            <br>
        </div>
        <button type="button" id="btn-left"> < </button>
        <div id="container-films">
            <div id="item" style="color: #ccc;"></div>
            @foreach( $filmes as $flm )
                <div id="item" style="color: #ccc;">
                    <!-- ATRIBUTOS DOS FILMES AQUI -->
                    <label>Título: </label>{{ $flm->titulo }} <br>
                    <label>Ano de lançamento: </label>{{ $flm->anoLancamento }} <br>
                    <label>Genero: </label>{{ $flm->genero }} <br>
                    <label>Diretor: </label>{{ $flm->diretor }} <br>
                    <label>Estúdio: </label>{{ $flm->estudio }} <br>
                    <label>Elenco: </label>{{ $flm->elenco }} <br>
                </div>
            @endforeach
            <div id="item" style="color: #ccc;"></div>
            <div id="limiter"></div>
        </div>
        <button type="button" id="btn-right"> > </button>
    </section>  <!-- Fim do carrossel -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                        <!-- Este bloco é parte do estilo da página -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/carousel-films.js"></script>
    <script src="js/slide-home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</x-app-layout>
