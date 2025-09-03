<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['cajas'] = $this->model->getCajas();
        $this->views->getView($this, "index", $data);
    }

    public function validar()
    {
        if (empty($_POST['nick']) || empty($_POST['clave'])) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $nick = $_POST['nick'];
            $clave = $_POST['clave'];

            $data = $this->model->getUsuario($nick, md5($clave));
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
            if ($data[$i]['usuario_estado'] == 1) {
                $data[$i]['usuario_estado'] = '<span class="badge badge-success">Activo</span>';
            } else {
                $data[$i]['usuario_estado'] = '<span class="badge badge-secondary">Inactivo</span>';
            }
            $data[$i]['acciones'] = '<button class="btn btn-warning" type="button" onclick="btnEditarUsuario(' . $data[$i]['id_usuario'] . ')">Editar</button> 
            <button class="btn btn-danger" type="button" onclick="btnInactivarUsuario(' . $data[$i]['id_usuario'] . ')">Inactivar</button>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        $id_usuario = $_POST['id_usuario'];
        $nick = $_POST['nick'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $confirmar = $_POST['confirmar'];
        $id_caja = $_POST['id_caja'];
        if (empty($nick) || empty($nombre) || empty($id_caja)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            if ($id_usuario == "") {
                if ($clave != $confirmar) {
                    $msg = "Las contraseñas no coinciden";
                } else {
                    $data = $this->model->registrarUsuario($nick, $nombre, md5($clave), $id_caja);
                    if ($data == "ok") {
                        $msg = "si";
                    } else {
                        $msg = "Error al registrar usuario";
                    }
                }
            }else{
                $data=$this->model->modificarUsuario($nick, $nombre, $id_caja, $id_usuario);
                if($data=="modificado"){
                    $msg="mod";
                }else{
                    $msg="Error al modificar usuario";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id)
    {
        $data = $this->model->editarUsuario($id);
        echo json_encode($data);
        die();
    }
}
