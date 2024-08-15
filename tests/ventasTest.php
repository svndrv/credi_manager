<?php

use PHPUnit\Framework\TestCase;

require_once 'config/conexion.php';
require_once 'model/ventas.php';

class VentasTest extends TestCase {
    private $ventas;

    protected function setUp(): void {
        $this->ventas = new Ventas();
    }

    public function testObtenerVentas() {
        $result = $this->ventas->obtener_ventas();
        $this->assertIsArray($result);
    }

    public function testObtenerVentasInner() {
        $result = $this->ventas->obtener_ventas_inner();
        $this->assertIsArray($result);
    }

    public function testAgregarVentas() {
        $response = $this->ventas->agregar_ventas('Juan Pérez', '12345678', 
        '987654321', 1500.00, 'Linea1', '12', 'Tem1', 1, 'LD', 'Desembolsado');
        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Se translado la venta con éxito.', $response['message']);
    }

    public function testActualizarVenta() {
        // Asumir que el ID 1 existe en la base de datos
        $response = $this->ventas->actualizar_venta(1, 'Juan Pérez', '12345678', 
        '987654321', 2000.00, 'Linea2', '24', 'Tem2', 'TC', 'Desembolsado');
        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Venta editada correctamente.', $response['message']);
    }

    public function testEliminarVenta() {
        // Asumir que el ID 1 existe en la base de datos
        $response = $this->ventas->eliminar_venta(1);
        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Se ha eliminado con exito.', $response['message']);
    }

    public function testObtenerVentasPorUsuario() {
        $result = $this->ventas->obtener_ventas_x_usuario(1, '1');
        $this->assertIsArray($result);
    }

    public function testContarLd() {
        $result = $this->ventas->contar_ld();
        $this->assertIsArray($result);
    }

    public function testContarTc() {
        $result = $this->ventas->contar_tc();
        $this->assertIsArray($result);
    }

    public function testContarLdMonto() {
        $result = $this->ventas->contar_ld_monto();
        $this->assertIsArray($result);
    }

    public function testContarLdPorId() {
        $result = $this->ventas->contar_ld_por_id(1);
        $this->assertIsArray($result);
    }

    public function testContarTcPorId() {
        $result = $this->ventas->contar_tc_por_id(1);
        $this->assertIsArray($result);
    }

    public function testContarLdMontoPorId() {
        $result = $this->ventas->contar_ld_monto_por_id(1);
        $this->assertIsArray($result);
    }

    public function testVentaXdniEstadoProducto() {
        $result = $this->ventas->venta_x_dni_estado_producto('12345678', 
        'Desembolsado', 'LD');
        $this->assertIsArray($result);
    }
}

?>
