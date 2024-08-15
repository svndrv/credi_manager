<?php
use PHPUnit\Framework\TestCase;

class VentasUsuarioTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=credi_manager', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testInsertUsuarioAndVenta()
    {
        // Insertar un nuevo usuario
        $stmt = $this->pdo->prepare("INSERT INTO usuario (usuario, contrasena, nombres, 
        apellidos, rol, estado) VALUES (?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute(['jdoe', 'password123', 'John', 'Doe', 'A', 'A']);
        $this->assertTrue($result);

        $usuarioId = $this->pdo->lastInsertId();
        $this->assertNotEmpty($usuarioId);

        $stmt = $this->pdo->prepare("INSERT INTO ventas (nombres, dni, celular, credito, 
        linea, plazo, tem, id_usuario, tipo_producto, estado, created_at, updated_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $result = $stmt->execute(['Juan Perez', 12345678, 987654321, 5000.00, 2000.00, 
        '12', 150.00, $usuarioId, 'Producto A', 'Pendiente']);
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM ventas WHERE dni = 12345678");
        $venta = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($venta);
        $this->assertEquals('Juan Perez', $venta['nombres']);
        $this->assertEquals($usuarioId, $venta['id_usuario']);

        $stmt = $this->pdo->query("SELECT * FROM usuario WHERE id = $usuarioId");
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($usuario);
        $this->assertEquals('John', $usuario['nombres']);
        $this->assertEquals('Doe', $usuario['apellidos']);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
