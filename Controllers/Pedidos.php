<?php
class Pedidos extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        $this->views->getView($this, "index");
    }

    public function nuevo_pedido()
    {
        $this->views->getView($this, "nuevo_pedido");
    }

    public function buscarCliente()
    {
        $documentoid = $_POST['documentoid'];
        $data = $this->model->buscarCliente($documentoid);
        if ($data) {
            echo json_encode($data);
        } else {
            $msg = "error";
            echo json_encode($msg);
        }
    }
    public function buscarProducto()
    {
        $codigo = $_POST["codigo"];
        $data = $this->model->buscarProducto($codigo);
        if ($data) {
            echo json_encode($data);
        } else {
            $msg = "error";
            echo json_encode($msg);
        }
    }

    public function verificarComunicacion()
    {
        require_once "Siat.php";
        $siat = new Siat();
        $res = $siat->verificarComunicacion();
        echo json_encode($res);
    }


    public function cuis()
    {
        if (!isset($_SESSION['scuis'])) {
            require "Siat.php";
            $siat = new Siat();
            $res = $siat->cuis();
            if ($res->RespuestaCuis->mensajesList->codigo == 980) {
                $_SESSION['scuis'] = $res->RespuestaCuis->codigo;
                $_SESSION['sfechaVigenciaCuis'] = $res->RespuestaCuis->fechaVigencia;
                echo $res->RespuestaCuis->codigo;
            } else {
                echo "error al solicitar el codigo cuis";
            }
        } else {
            echo $_SESSION['scuis'];
        }
    }

    public function cufd()
    {
        if (!isset($_SESSION['scufd'])) {
            require "Siat.php";
            $siat = new Siat();
            $res = $siat->cufd();
            if ($res->RespuestaCufd->transaccion == true) {
                $_SESSION['scufd'] = $res->RespuestaCufd->codigo;
                $_SESSION['scodigoControl'] = $res->RespuestaCufd->codigoControl;
                $_SESSION['sfechaVigenciaCufd'] = $res->RespuestaCufd->fechaVigencia;
            } else {
                $res = false;
            }
        } else {
            $fechaVigente = substr($_SESSION['sfechaVigenciaCufd'], 0, 16);
            $fechaVigente = str_replace("T", " ", $fechaVigente);
            if ($fechaVigente < date("Y-m-d H:i")) {
                require "Siat.php";
                $siat = new Siat();
                $res = $siat->cufd();
                if ($res->RespuestaCufd->transaccion == true) {
                    $_SESSION['scufd'] = $res->RespuestaCufd->codigo;
                    $_SESSION['scodigoControl'] = $res->RespuestaCufd->codigoControl;
                    $_SESSION['sfechaVigenciaCufd'] = $res->RespuestaCufd->fechaVigencia;
                } else {
                    $res = false;
                }
            } else {
                $res['RespuestaCufd']['transaccion'] = true;
                $res['RespuestaCufd']['codigo'] = $_SESSION['scufd'];
                $res['RespuestaCufd']['fechaVigencia'] = $_SESSION['sfechaVigenciaCufd'];
            }
        }
        echo json_encode($res);
    }
    public function sincronizarActividades()
    {
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->sincronizarActividades();
        echo json_encode($res);
    }

    public function sincronizarListaProductosServicios()
    {
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->sincronizarListaProductosServicios();
        echo json_encode($res);
    }

    public function sincronizarParametricaUnidadMedida()
    {
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->sincronizarParametricaUnidadMedida();
        echo json_encode($res);
    }

    public function sincronizarListaLeyendasFactura()
    {
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->sincronizarListaLeyendasFactura();
        echo json_encode($res);
    }

    public function emitirFactura()
    {
        $datos = $_POST['factura'];
        $valores = $datos['factura'][0]['cabecera'];
        $nitEmisor = $valores['nitEmisor'];
        $nitEmisor = str_pad($nitEmisor, 13, "0", STR_PAD_LEFT);
        $fechaEmision = $valores['fechaEmision'];
        $fechafinal = str_replace("T", "", $fechaEmision);
        $fechafinal = str_replace("-", "", $fechafinal);
        $fechafinal = str_replace(":", "", $fechafinal);
        $fechafinal = str_replace(".", "", $fechafinal);
        //20250923173220568
        $sucursal = 0;
        $sucursal = str_pad($sucursal, 4, "0", STR_PAD_LEFT);
        $modalidad = 2;
        $tipoEmision = 1;
        $tipoFactura = 1;
        $tipoDocSector = 1;
        $tipoDocSector = str_pad($tipoDocSector, 2, "0", STR_PAD_LEFT);
        $numeroFactura = $valores['numeroFactura'];
        $numeroFactura = str_pad($numeroFactura, 10, "0", STR_PAD_LEFT);
        $puntoVenta = 0;
        $puntoVenta = str_pad($puntoVenta, 4, "0", STR_PAD_LEFT);
        $cadena = $nitEmisor . $fechafinal . $sucursal . $modalidad . $tipoEmision . $tipoFactura . $tipoDocSector . $numeroFactura . $puntoVenta;
        $modulo11 = $this->obtenerModulo11($cadena);
        $cadena .= $modulo11;
        $base16 = $this->base16($cadena);
        $cuf = $base16 . $_SESSION['scodigoControl'];
        $datos['factura'][0]['cabecera']['cuf'] = $cuf;
        $temporal = $datos['factura'];
        $xml_temporal = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
        <facturaComputarizadaCompraVenta 
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
        xsi:noNamespaceSchemaLocation="facturaComputarizadaCompraVenta.xsd">
        </facturaComputarizadaCompraVenta>');

        $this->formato_xml($temporal, $xml_temporal);
        $xml_temporal->asXML("docs/facturas.xml");
        $archivoxml = "";
        $file = fopen("docs/facturas.xml", "r");
        while(!feof($file)) {
            $linea = fgets($file);
            $archivoxml .= $linea;
        }
        fclose($file);
        $gzip = gzencode($archivoxml, 9);
        $file = fopen("docs/facturas.xml.gz", "w");
        fwrite($file, $gzip);
        fclose($file);
        $archivo = $gzip;
        $hashArchivo = hash('sha256', $archivoxml);
        require "Siat.php";
        $siat = new Siat();
        $resFactura=$siat->recepcionFactura($archivo, $fechaEmision, $hashArchivo);
        echo json_encode($resFactura);

        //E3ACE3F0A8D13E961CCCEAE0BB70452894D18DA7C62D31E474BB12F74
    }

    public function calculaDigitoMod11(string $cadena, int $numDig, int $limMult, bool $x10): string
    {
        if (!$x10) {
            $numDig = 1;
        }
        for ($n = 1; $n <= $numDig; $n++) {
            $suma = 0;
            $mult = 2;
            for ($i = strlen($cadena) - 1; $i >= 0; $i--) {
                $suma += ($mult * substr($cadena, $i, $i + 1));
                if (++$mult > $limMult) {
                    $mult = 2;
                }
            }
            if ($x10) {
                $dig = (($suma * 10) % 11) % 10;
            } else {
                $dig = $suma % 11;
            }
            if ($dig == 10) {
                $cadena .= "1";
            } elseif ($dig == 11) {
                $cadena .= "0";
            } elseif ($dig < 10) {
                $cadena .= $dig;
            }
        }
        return substr($cadena, strlen($cadena) - $numDig, strlen($cadena));
    }

    public function obtenerModulo11(String $cadena): string
    {
        $vDigito = $this->calculaDigitoMod11($cadena, 1, 9, false);
        return $vDigito;
    }

    public function base16($number): string
    {
        $hexvalores = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
        $hexval = '';
        while ($number != '0') {
            $hexval = $hexvalores[round(bcmod($number, '16'))] . $hexval;
            $number = bcdiv($number, '16', 0);
        }
        return $hexval;
    }

    public function formato_xml($temporal, &$xml_temporal)
    {
        $xsi = "http://www.w3.org/2001/XMLSchema-instance";

        foreach ($temporal as $llave => $valor) {
            if (is_array($valor)) {
                if (!is_numeric($llave)) {
                    $subnodo = $xml_temporal->addChild($llave);
                    $this->formato_xml($valor, $subnodo);
                } else {
                    $this->formato_xml($valor, $xml_temporal);
                }
            } else {
                if ($valor === null || $valor === '') {
                    $hijo = $xml_temporal->addChild($llave);
                    $hijo->addAttribute('xsi:nil', 'true', $xsi);
                } else {
                    $xml_temporal->addChild($llave, htmlspecialchars($valor));
                }
            }
        }
    }
}
