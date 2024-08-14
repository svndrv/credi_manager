<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../model/cartera.php';

class CarteraTest extends TestCase
{
    protected $cartera;
    protected $pdo;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->cartera = new Cartera();
        $this->cartera->setDb($this->pdo);
    }

    public function testObtenerCartera()
    {
        $result = [
            ['id' => 1, 'nombres' => 'Milenna Palomino Gutierres', 
            'dni' => 78657837, 'celular' => 998766652, 'id_usuario' => 9, 'created_at' => '2024-08-06 22:32:34', 
            'updated_at' => '2024-08-08 00:00:57']
        ];

        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('fetchAll')->willReturn($result);

        $this->pdo->method('prepare')->willReturn($stmt);

        $cartera = $this->cartera->obtener_cartera(9);
        $this->assertCount(1, $cartera);
        $this->assertEquals('Milenna Palomino Gutierres', $cartera[0]['nombres']);
        $this->assertEquals(78657837, $cartera[0]['dni']);
    }

    public function testObtenerCarteraXId()
    {
        $result = ['id' => 1, 'nombres' => 'Milenna Palomino Gutierres', 
        'dni' => 78657837, 'celular' => 998766652, 'id_usuario' => 9, 
        'created_at' => '2024-08-06 22:32:34', 'updated_at' => '2024-08-08 00:00:57'];

        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('fetchAll')->willReturn([$result]);

        $this->pdo->method('prepare')->willReturn($stmt);

        $cartera = $this->cartera->obtener_cartera_x_id(1);
        $this->assertCount(1, $cartera);
        $this->assertEquals('Milenna Palomino Gutierres', $cartera[0]['nombres']);
        $this->assertEquals(78657837, $cartera[0]['dni']);
    }

    public function testAgregarCartera()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('execute')->willReturn(true);

        $this->pdo->method('prepare')->willReturn($stmt);

        $result = $this->cartera->agregar_cartera('Juan Pérez', 12345678, 987654321, 66);
        $this->assertEquals('success', $result['status']);
        $this->assertEquals('Cliente creado exitosamente.', $result['message']);
    }

    public function testEliminarCartera()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('execute')->willReturn(true);

        $this->pdo->method('prepare')->willReturn($stmt);

        $result = $this->cartera->eliminar_cartera(1);
        $this->assertEquals('success', $result['status']);
        $this->assertEquals('Cliente eliminado exitosamente.', $result['message']);
    }

    public function testActualizarCartera()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('execute')->willReturn(true);

        $this->pdo->method('prepare')->willReturn($stmt);

        $result = $this->cartera->actualizar_cartera(1, 'Juan Pérez', 12345678, 987654321);
        $this->assertEquals('success', $result['status']);
        $this->assertEquals('Cliente editado correctamente.', $result['message']);
    }

    public function testObtenerCarteraXdni()
    {
        $result = [
            ['id' => 1, 'nombres' => 'Milenna Palomino Gutierres', 'dni' => 78657837, 
            'celular' => 998766652, 'id_usuario' => 9, 'created_at' => '2024-08-06 22:32:34', 
            'updated_at' => '2024-08-08 00:00:57']
        ];

        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('fetchAll')->willReturn($result);

        $this->pdo->method('prepare')->willReturn($stmt);

        $cartera = $this->cartera->obtener_cartera_x_dni(78657837);
        $this->assertCount(1, $cartera);
        $this->assertEquals('Milenna Palomino Gutierres', $cartera[0]['nombres']);
    }
}
?>
