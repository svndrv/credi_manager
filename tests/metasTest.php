<?php
use PHPUnit\Framework\TestCase;

require_once 'config/conexion.php';
require_once 'model/metas.php';

class MetasTest extends TestCase {
    private $metas;

    protected function setUp(): void {
        $this->metas = new Metas();
    }

    public function testObtenerMetas() {
        $result = $this->metas->obtener_metas();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);

        foreach ($result as $meta) {
            $this->assertArrayHasKey('id', $meta);
            $this->assertArrayHasKey('ld_cantidad', $meta);
            $this->assertArrayHasKey('tc_cantidad', $meta);
            $this->assertArrayHasKey('ld_monto', $meta);
            $this->assertArrayHasKey('usuario_nombre', $meta);
            $this->assertArrayHasKey('mes', $meta);
            $this->assertArrayHasKey('cumplido', $meta);
        }
    }

    public function testObtenerMetasPorUsuario() {
        $id_usuario = 55;  // Usar un id_usuario existente
        $mes = '2';
        $cumplido = 'Cumplido';
        $result = $this->metas->obtener_metas_por_usuario($id_usuario, $mes, $cumplido);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);

        foreach ($result as $meta) {
            $this->assertEquals($id_usuario, $meta['id_usuario']);
            $this->assertEquals($mes, $meta['mes']);
            $this->assertEquals($cumplido, $meta['cumplido']);
        }
    }

    public function testEliminarMeta() {
        $id = 6;  // Usar un id existente
        $this->metas->eliminar_meta($id);

        $result = $this->metas->obtener_meta_x_id($id);
        $this->assertEmpty($result);
    }

    public function testActualizarMeta() {
        $id = 5;
        $ld_cantidad = 100;
        $tc_cantidad = 20;
        $ld_monto = 50.000;
        $id_usuario = 55;
        $mes = '2';
        $cumplido = 'Cumplido';

        $this->metas->actualizar_meta($id, $ld_cantidad, $ld_monto, 
        $tc_cantidad, $id_usuario, $mes, $cumplido);

        $result = $this->metas->obtener_meta_x_id($id);
        $this->assertNotEmpty($result);

        $meta = $result[0];
        $this->assertEquals($ld_cantidad, $meta['ld_cantidad']);
        $this->assertEquals($tc_cantidad, $meta['tc_cantidad']);
        $this->assertEquals($ld_monto, $meta['ld_monto']);
        $this->assertEquals($mes, $meta['mes']);
        $this->assertEquals($cumplido, $meta['cumplido']);
    }

    public function testAgregarMeta() {
        $ld_cantidad = 10;
        $ld_monto = 20.000;
        $tc_cantidad = 5;
        $id_usuario = 55;
        $mes = '3';
        $cumplido = 'No Cumplido';

        $response = $this->metas->agregar_meta($ld_cantidad, $ld_monto, $tc_cantidad, $id_usuario, $mes, $cumplido);
        $this->assertEquals('success', $response['status']);

        $result = $this->metas->obtener_metas_por_usuario($id_usuario, $mes, $cumplido);
        $this->assertNotEmpty($result);

        $meta = $result[0];
        $this->assertEquals($ld_cantidad, $meta['ld_cantidad']);
        $this->assertEquals($tc_cantidad, $meta['tc_cantidad']);
        $this->assertEquals($ld_monto, $meta['ld_monto']);
        $this->assertEquals($mes, $meta['mes']);
        $this->assertEquals($cumplido, $meta['cumplido']);
    }

    public function testMetasXUsuarioMesCumplido() {
        $id_usuario = 55;
        $mes = '2';
        $cumplido = 'Cumplido';
    
        $result = $this->metas->metas_x_usuario_mes_cumplido($id_usuario, $mes, $cumplido);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    
        foreach ($result as $meta) {
            $this->assertEquals($mes, $meta['mes']);
            $this->assertEquals($cumplido, $meta['cumplido']);
            // Puedes verificar otros campos si lo deseas
        }
    }
}
?>