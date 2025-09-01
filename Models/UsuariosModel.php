<?php
class UsuariosModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios(){
        $sql = "SELECT * FROM usuarios";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getUsuario(string $nick, string $clave){
        $sql = "SELECT * FROM usuarios WHERE nick = '$nick' AND clave = '$clave'";
        $data = $this->select($sql);
        return $data;
    }
}
?>