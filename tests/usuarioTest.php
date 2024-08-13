<?php

use PHPUnit\Framework\TestCase;
use PDO;
use PDOStatement;

require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../model/usuario.php';

class UsuarioTest extends TestCase
{
    protected $usuario;
    protected $pdo;
    protected $stmt;

    protected function setUp(): void
    {
        // Crea un mock de la conexión PDO
        $this->pdo = $this->getMockBuilder(PDO::class)
                          ->disableOriginalConstructor()
                          ->getMock();

        // Crea un mock del statement PDO
        $this->stmt = $this->getMockBuilder(PDOStatement::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        // Configura el mock de la conexión para devolver el mock del statement
        $this->pdo->method('prepare')
                  ->willReturn($this->stmt);

        // Crea una instancia del modelo Usuario con la conexión mockeada
        $this->usuario = $this->getMockBuilder(Usuario::class)
                              ->setConstructorArgs([$this->pdo])
                              ->setMethodsExcept(['login', 'obtener_usuarios', 'obtener_usuario_x_id'])
                              ->getMock();
    }

    public function testLoginExitoso()
    {
        $usuario = 'administrador';
        $contrasena = '123';
        $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

        $this->stmt->method('rowCount')
                   ->willReturn(1);

        $this->stmt->method('fetch')
                   ->willReturn([
                       'id' => 1,
                       'usuario' => $usuario,
                       'contrasena' => $hashedPassword,
                       'rol' => 'admin',
                       'nombres' => 'Test',
                       'apellidos' => 'User',
                       'estado' => 1
                   ]);

        $resultado = $this->usuario->login($usuario, $contrasena);

        $this->assertEquals('success', $resultado['status']);
        $this->assertEquals('dashboard.php?view=inicio', $resultado['url']);
    }

    public function testLoginUsuarioInexistente()
    {
        $usuario = 'inexistente';
        $contrasena = 'password123';

        $this->stmt->method('rowCount')
                   ->willReturn(0);

        $resultado = $this->usuario->login($usuario, $contrasena);

        $this->assertEquals('error', $resultado['status']);
        $this->assertEquals('El usuario no existe.', $resultado['message']);
    }

    public function testObtenerUsuarios()
    {
        $usuarios = [
            ['id' => 9, 'usuario' => 'Asesor'],
            ['id' => 66, 'usuario' => 'Administrador'],
            ['id' => 23, 'usuario' => 'Operador'],
            ['id' => 55, 'usuario' => 'AdministradorPrueba'],
            ['id' => 56, 'usuario' => 'AsesorPrueba'],
            ['id' => 57, 'usuario' => 'OperadorPrueba']
        ];

        $this->stmt->method('fetchAll')
                   ->willReturn($usuarios);

        $resultado = $this->usuario->obtener_usuarios();
        $this->assertCount(6, $resultado);
        $this->assertEquals('Asesor', $resultado[0]['usuario']);
    }
}