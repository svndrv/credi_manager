<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../model/metasfv.php';

class MetasfvTest extends TestCase {
    private $metasfv;

    protected function setUp(): void {
        $this->metasfv = new Metasfv();
    }

    public function testObtenerMetasfv() {
        $result = $this->metasfv->obtener_metasfv();
        $this->assertIsArray($result);
    }

    public function testAgregarMeta() {
        $result = $this->metasfv->agregar_metafv(50, 1000.00, 10, 'Lima', '08', 'Pendiente');
        $this->assertEquals('success', $result['status']);
    }

    public function testActualizarMeta() {
        $result = $this->metasfv->actualizar_metafv(1, 55, 20, 2000.00, 'Lima', '08', 'Cumplido');
        $this->assertEquals('success', $result['status']);
    }

    public function testEliminarMeta() {
        $result = $this->metasfv->eliminar_metafv(1);
        $this->assertEquals('success', $result['status']);
    }

    public function testObtenerMetasPorMesYCumplido() {
        $mes = '08';
        $cumplido = 'Pendiente';

        $result = $this->metasfv->obtener_metas_por_mes_y_cumplido($mes, $cumplido);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);

        foreach ($result as $meta) {
            $this->assertEquals($mes, $meta['mes']);
            $this->assertEquals($cumplido, $meta['cumplido']);
        }
    }

    public function testObtenerMetaPorId() {
        $id = 2;
        $result = $this->metasfv->obtener_meta_x_id($id);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);

        $meta = $result[0];
        $this->assertEquals($id, $meta['id']);
    }
}
?>
