<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../model/base.php';

class BaseTest extends TestCase
{
    protected $base;
    protected $pdo;
    protected $stmt;

    protected function setUp(): void
    {

        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->pdo->method('prepare')
                  ->willReturn($this->stmt);
        $this->base = new Base();
        $this->base->setDb($this->pdo); 
    }

    public function testVerificarDniBase()
    {

        $this->stmt->method('fetch')
                   ->willReturn(['dni' => '12345678']);

        ob_start(); 
        $this->base->verificar_dni_base('12345678');
        $output = ob_get_clean(); 

        $this->assertEquals('1', $output); 
    }

    public function testEliminarBase()
    {
        $this->stmt->expects($this->once())
                   ->method('execute');

        ob_start();
        $this->base->eliminar_base(1);
        $output = ob_get_clean(); 

        $this->assertEquals('ok', $output); 
    }

    public function testObtenerBaseXdni()
    {
        $datos = [
            ['id' => 1, 'dni' => '12345678', 'nombres' => 'Juan Pérez']
        ];

        $this->stmt->method('fetchAll')
                   ->willReturn($datos);

        $resultado = $this->base->obtener_base_x_dni('12345678');
        $this->assertCount(1, $resultado);
        $this->assertEquals('Juan Pérez', $resultado[0]['nombres']);
    }

    public function testObtenerRegistrosPaginados()
    {
        $datos = [
            ['id' => 1, 'dni' => '12345678', 'nombres' => 'Juan Pérez'],
            ['id' => 2, 'dni' => '87654321', 'nombres' => 'Ana Gómez']
        ];

        $this->stmt->method('fetchAll')
                   ->willReturn($datos);

        $resultado = $this->base->obtener_registros_paginados(2, 0);
        $this->assertCount(2, $resultado);
        $this->assertEquals('Juan Pérez', $resultado[0]['nombres']);
    }

    public function testContarRegistros()
    {
        $this->stmt->method('fetch')
                   ->willReturn(['total' => 5]);

        $resultado = $this->base->contar_registros();
        $this->assertEquals(5, $resultado);
    }

    public function testObtenerBaseXId()
    {
        $datos = [
            ['id' => 1, 'dni' => '12345678', 'nombres' => 'Juan Pérez']
        ];

        $this->stmt->method('fetchAll')
                   ->willReturn($datos);

        $resultado = $this->base->obtener_base_x_id(1);
        $this->assertCount(1, $resultado);
        $this->assertEquals('Juan Pérez', $resultado[0]['nombres']);
    }

    public function testInsertData()
    {
        $data = [
            ['12345678', 'Juan Pérez', 'Cliente', 'Dirección 1', 'Distrito 1',
             1000, 2000, 12, 100, 'Cel1', 'Cel2', 'Cel3', 'Producto', 'Combo']
        ];

        $this->stmt->expects($this->exactly(1))
                   ->method('execute');

        $this->base->insertData($data);
        $this->assertTrue(true); 
    }

    public function testBorrarBase()
    {
        $this->stmt->expects($this->once())
                   ->method('execute');

        $resultado = $this->base->borrar_base();
        $this->assertEquals(['status' => 'success', 'message' 
        => 'La base de elimino correctamente.'], $resultado);
    }
}
