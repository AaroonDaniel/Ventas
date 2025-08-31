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
}
?>