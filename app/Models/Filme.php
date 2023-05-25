<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;
    private $titulo;
    private $anoLancamento;
    private $genero;
    private $diretor;
    private $estudio;
    private $elenco;
}
