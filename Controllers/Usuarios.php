<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['cajas']=$this->model->getCajas();
        $this->views->getView($this, "index",$data);
    }

    public function validar()
    {
        if (empty($_POST['nick']) || empty($_POST['clave'])) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $nick = $_POST['nick'];
            $clave = $_POST['clave'];

            $data = $this->model->getUsuario($nick, $clave);
            if ($data) {
                $msg = "ok";
            } else {
                $msg = "Usuario o clave incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function listar()
    {
        $data = $this->model->getUsuarios();
        for ($i = 0; $i < count($data); $i++) {
            if($data[$i]['usuario_estado']==1){
                $data[$i]['usuario_estado'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $data[$i]['usuario_estado'] = '<span class="badge badge-secondary">Inactivo</span>';
            }
            $data[$i]['acciones'] = '<button class="btn btn-warning" type="button" >Editar</button> <button class="btn btn-danger" type="button" >Inactivar</button>';
        }
        echo json_encode($data);
        die();
    }
}
