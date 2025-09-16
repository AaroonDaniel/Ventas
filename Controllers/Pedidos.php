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
                $_SESSION['scuis'] = $res->respuestaCuis->codigo;
                $_SESSION['sfechaVigenciaCuis'] = $res->RespuestaCuis->fechaVigencia;
                echo $res->respuestaCuis->codigo;
            } else {
                echo "error al solicitar codigo CUIS";
            }
        }else{
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
            echo json_encode($res);
        }
    }

    public function sincronizarActividades(){
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->sincronizarActividades();
        echo json_encode($res);
    }

    public function sincronizarListaProductosServicios(){
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->sincronizarListaProductosServicios();
        echo json_encode($res);
    }

    public function sincronizarParametricaUnidadMedida(){
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->sincronizarParametricaUnidadMedida();
        echo json_encode($res);
    }

}
