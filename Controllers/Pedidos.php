<?php 
class Pedidos extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index(){
        $this->views->getView($this,"index");
    }

    public function nuevo_pedido(){
        $this->views->getView($this,"nuevo_pedido");
    }

    public function buscarCliente(){
        $documentoid = $_POST ['documentoid'];
        $data = $this->model->buscarCliente($documentoid);
        if($data){
            echo json_encode($data);
        }else{
            $msg="error";
            echo json_encode($msg);
        }
    }
    public function buscarProducto(){
        $codigo = $_POST["codigo"];
        $data=$this->model->buscarProducto($codigo);
        if($data){
            echo json_encode($data);
        }else{
            $msg = "error";
            echo json_encode($msg);
        }
    }

    public function verificarComunicacion(){
        require_once "Siat.php";
        $siat = new Siat();
        $res = $siat->verificarComunicacion();
        echo json_encode($res);
    }


    public function cuis(){
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->cuis();
        if($res->RespuestaCuis->mensajesList->codigo = 980){
            $_SESSION['scuis'] = $res->respuestaCuis->codigo;
            $_SESSION['sfechaVigenciaCuis'] = $res->RespuestaCuis->fechaVigencia;
            echo $res->respuestaCuis->codigo;
        }else{
            echo "error al solicitar codigo CUIS";
        }
       
    }

    public function cufd(){
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->cufd();
        echo json_encode($res);
    }

} 

?>