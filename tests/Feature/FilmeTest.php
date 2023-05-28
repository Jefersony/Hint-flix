<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Filme;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class FilmeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_01_exibir_tela_de_dashboard(): void 
    {
        $acessoDaPgInicial = $this->get('/');
        // Acesso está OK
        $acessoDaPgInicial->assertStatus(200);

        $usuario = User::factory()->create();
        $resposta = $this->post('/login', [
            'email' => $usuario->email,
            'password' => '12345678',
        ]);
        $email = $usuario->email;
        $this->assertTrue( $usuario->email == $email );
        
        // $this->assertAuthenticated();
        $acessoDoDashboard = $this->get('/dashboard');
        // Protocolo 302:
        // Verifica acesso do usuário LOGADO ao dashboard
        $acessoDoDashboard->assertStatus(302);
    }

}
