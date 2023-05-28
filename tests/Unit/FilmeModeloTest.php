<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Filme;

class FilmeModeloTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /**
     * Teste da criação de uma instância de Filme no sistema.
     */
    public function test_01_filme_pode_ser_criado(): void 
    {
        $filme = new Filme();
        $filme->titulo = "Matrix";
        $filme->anoLancamento = 1999;
        $filme->genero = "Ação";
        $filme->estudio = "Warner";
        $filme->diretor = "Fulano";

        $this->assertTrue($filme->titulo == "Matrix");
        $this->assertFalse($filme->anoLancamento == 2000);
        $this->assertSame($filme->anoLancamento, 1999);
    }

    /**
     * Teste de verificação de falha no Test Case
     */
    public function test_verifica_falha_da_engine_Test_Case(): void
    {
        // this->assertFalse(true);
        $this->assertFalse(false);
    }
}
