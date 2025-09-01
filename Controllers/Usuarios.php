<?php
class Usuarios extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['usuarios'] = $this->model->getUsuarios();
        $this->views->getView($this, "index");
    }

    public function validar(){
        if(empty($_POST['nick']) || empty($_POST['clave'])){
            $msg = "Todos los campos son obligatorios";
        }else{
            $nick = $_POST['nick'];
            $clave = $_POST['clave'];

            $data = $this->model->getUsuario($nick, $clave);
            if($data){
                $msg = "ok";
            }else{
                $msg = "Usuario o clave incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}

?>