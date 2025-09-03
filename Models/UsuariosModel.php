<?php
class UsuariosModel extends Query{
    private $nick, $nombre, $clave, $id_caja;
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

    public function registrarUsuario(string $nick, string $nombre, string $clave, int $id_caja){
        $this->nick = $nick;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->id_caja = $id_caja;
        $sql = "INSERT INTO usuarios(nick,nombre,clave,id_caja) VALUES (?,?,?,?)";
        $datos = array($this->nick, $this->nombre, $this->clave, $this->id_caja);
        $data=$this->save($sql,$datos);
        if($data==1){
            $res = "ok";
        }else{
            $res = "Error ";
        }
        return $res;
    } 

    public function editarUsuario(int $id){
        $sql = "select * from usuarios where id_usuario = '".$id."'";
        $data = $this->select($sql);
        return $data;
    }
}
?>