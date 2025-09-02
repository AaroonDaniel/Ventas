<?php
class UsuariosModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios(){
        $sql = "select u.*, c.caja
        from usuarios u inner join cajas c on c.id_caja = u.id_caja";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getUsuario(string $nick, string $clave){
        $sql = "SELECT * FROM usuarios WHERE nick = '$nick' AND clave = '$clave'";
        $data = $this->select($sql);
        return $data;
    }

    public function getCajas(){
        $sql = "select * from cajas where caja_estado=1";
        $data=$this->selectAll($sql);
        return $data;
    }
}
?>