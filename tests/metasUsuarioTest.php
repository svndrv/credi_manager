<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../model/metas.php';
require_once __DIR__ . '/../model/usuario.php';

class MetasUsuarioTest extends TestCase
{
    private $pdo;
    private $metas;
    private $usuario;

    protected function setUp(): void
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=credi_manager', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->metas = new Metas();
        $this->usuario = new Usuario(); 
    }

    public function testUsuarioAndMetasOperations()
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuario (usuario, contrasena, nombres, 
        apellidos, rol, estado) VALUES (?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute(['jdoe', 'password123', 'John', 'Doe', 'A', 'A']);
        $this->assertTrue($result, 'No se pudo insertar el usuario');

        $usuarioId = $this->pdo->lastInsertId();
        $this->assertNotEmpty($usuarioId, 'ID del usuario no debe estar vacío');

        $response = $this->metas->agregar_meta(10, 1000.00, 5, $usuarioId, '08', 'Pendiente');
        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Meta creada exitosamente.', $response['message']);

        $metas = $this->metas->obtener_metas();
        $this->assertNotEmpty($metas, 'No se encontraron metas');

        echo "Metas: " . print_r($metas, true) . PHP_EOL;

        $idMeta = null;
        foreach ($metas as $meta) {
            if (isset($meta['id_usuario']) && $meta['id_usuario'] == $usuarioId) {
                $idMeta = $meta['id']; 
                break;
            }
        }
        $this->assertNotNull($idMeta, 'No se encontró la ID de la meta');
        $this->metas->actualizar_meta($idMeta, 15, 1200.00, 10, $usuarioId, '08', 'Completado');
        $metaActualizada = $this->metas->obtener_meta_x_id($idMeta);
        $this->assertNotEmpty($metaActualizada, 'No se encontró la meta actualizada');
        $this->assertArrayHasKey(0, $metaActualizada, 'El índice 0 no está presente en la meta actualizada');
        $this->assertEquals(15, $metaActualizada[0]['ld_cantidad']);
        $this->assertEquals('Completado', $metaActualizada[0]['cumplido']);

        $this->metas->eliminar_meta($idMeta);

        $metaEliminada = $this->metas->obtener_meta_x_id($idMeta);
        $this->assertEmpty($metaEliminada, 'La meta no fue eliminada');
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
        $this->metas = null;
        $this->usuario = null; 
    }
}
