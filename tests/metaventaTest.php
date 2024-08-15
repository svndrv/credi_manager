<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../model/metaventa.php';

class metaventaTest extends TestCase {
    private $metaventa;

    protected function setUp(): void {
        $this->metaventa = new metaventa();
    }

    public function testListarMetas_Venta() {
        $result = $this->metaventa->listarMetas_Venta();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        foreach ($result as $meta) {
            $this->assertArrayHasKey('id', $meta);
            $this->assertArrayHasKey('LDCantidad', $meta);
            $this->assertArrayHasKey('LDMonto', $meta);
            $this->assertArrayHasKey('TCCantidad', $meta);
            $this->assertArrayHasKey('Usuario', $meta);
            $this->assertArrayHasKey('cumplido', $meta);
        }
    }
}

?>
