<?php
use PHPUnit\Framework\TestCase;

require_once 'config/conexion.php';
require_once 'model/consultas.php';

class ConsultasTest extends TestCase
{
    private $consultas;

    protected function setUp(): void
    {
        $this->consultas = new Consultas();
    }

    public function testObtenerConsultas()
    {
        $resultado = $this->consultas->obtener_consultas();
        $this->assertIsArray($resultado);
        $this->assertNotEmpty($resultado);
    }

    public function testCrearConsulta()
    {
        $dni = 12345678;
        $celular = 987654321;
        $descripcion = 'Consulta de prueba';
        $campana = 'Si';

        $this->consultas->crear_consulta($dni, $celular, $descripcion, $campana);

        $resultado = $this->consultas->obtener_x_dni_campana($dni, $campana);
        $this->assertIsArray($resultado);
        $this->assertNotEmpty($resultado);
    }

    public function testEliminarConsulta()
    {
        $id = 119;

        $this->consultas->eliminar_consulta($id);
        $resultado = $this->consultas->obtener_consulta_x_id($id);
        $this->assertEmpty($resultado);
    }

    public function testObtenerConsultaPorDniCampana()
    {
        $dni = 11112222;
        $campana = 'Si';

        $resultado = $this->consultas->obtener_x_dni_campana($dni, $campana);
        $this->assertIsArray($resultado);
        $this->assertNotEmpty($resultado);
    }

    public function testObtenerConsultaPorId()
    {
        $id = 118;

        $resultado = $this->consultas->obtener_consulta_x_id($id);
        $this->assertIsArray($resultado);
        $this->assertNotEmpty($resultado);
    }

    public function testActualizarConsulta()
    {
        $id = 118;
        $dni = 11112222;
        $celular = 999999999;
        $descripcion = 'Descripción actualizada';
        $campana = 'Si';

        $this->consultas->actualizar_consulta($id, $dni, $celular, $descripcion, $campana);

        $resultado = $this->consultas->obtener_consulta_x_id($id);
        $this->assertIsArray($resultado);
        $this->assertNotEmpty($resultado);
        $this->assertEquals($dni, $resultado[0]['dni']);
        $this->assertEquals($celular, $resultado[0]['celular']);
        $this->assertEquals($descripcion, $resultado[0]['descripcion']);
        $this->assertEquals($campana, $resultado[0]['campana']);
    }
}
?>