<?php 
class Pedidos extends Controller{
    public function __construct()
    {
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

} 

?>