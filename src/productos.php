<?

namespace Shop\Markus\productos;
//use Shop\Markus\elementos\Elementos;
use DateTime;

class Productos
{
  public $nombreFabricante;
  public $nombre;
  public $precioBase;
  public $peso;
  public $volumen;
  private $fechaCaduc;
  private $impuesto = 0.07;
  public function __construct($nombreFabricante, $nombre, $precioBase, $peso, $volumen)
  {
    $this->nombreFabricante = $nombreFabricante;
    $this->nombre = $nombre;
    $this->precioBase = $precioBase;
    $this->peso = $peso;
    $this->volumen = $volumen;
    $this->fechaCaduc = new DateTime();
    //$this->fechaCaduc = date_format($this->fechaCaduc,'Y-m-d');
    $this->impuesto = 0.07;
  }
  public function modificarImpuesto($imp)
  {
    $this->impuesto = $imp;
  }
  public function costeEnvio()
  {
  }
  public static function caducado()
  {
    $now = new DateTime();
    $now = date_format($now, 'Y-m-d');
    if (self::$fechaCaduc != null) {
      if (self::diasRestantes(self::$fechaCaduc) <= 30) {
        self::$precioBase * 0.10;
        return true;
      } else if (self::diasRestantes(self::$fechaCaduc) <= 10) {
        self::$precioBase * 0.25;
        return true;
      } else if (self::$fechaCaduc > new DateTime('d')) {
        return false;
      } else return true;
    }
  }

  public static function diasRestantes($fecha)
  {
    $now = new DateTime();
    $diferencia = $fecha->diff($now);
    return $diferencia->days;
  }
}
