<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../model/conexion.php';
require_once __DIR__ . '/../model/usuario.php';
require_once __DIR__ . '/../model/cartera.php';

class UsuarioCarteraTest extends TestCase
{
    private $usuarioModel;
    private $carteraModel;

    protected function setUp(): void
    {
        $this->usuarioModel = new Usuario();
        $this->carteraModel = new Cartera();
    }

    public function testCrearUsuarioConCartera()
    {
        // Crear un usuario
        $usuarioData = [
            'usuario' => 'test_user',
            'contrasena' => password_hash('test_password', PASSWORD_BCRYPT),
            'nombres' => 'Test',
            'apellidos' => 'User',
            'rol' => 'A',
            'estado' => '1',
            'foto' => null,
        ];
        $usuarioId = $this->usuarioModel->create($usuarioData);

        $this->assertIsInt($usuarioId);

        $carteraData = [
            'nombres' => 'Client Test',
            'dni' => 12345678,
            'celular' => 987654321,
            'id_usuario' => $usuarioId,
        ];
        $carteraId = $this->carteraModel->create($carteraData);

        $this->assertIsInt($carteraId);

        $cartera = $this->carteraModel->find($carteraId);
        $this->assertEquals($usuarioId, $cartera['id_usuario']);
    }

    protected function tearDown(): void
    {
        // Limpiar datos de prueba
        $this->carteraModel->deleteAll(); 
        $this->usuarioModel->deleteAll(); 
    }
}
