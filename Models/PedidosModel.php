<?php
class PedidosModel extends Query{
    public function __construct()   
    {
        parent::__construct();
    }

    public function buscarCliente(string $documentoid){
        $sql = "select * from clientes where documentoid='".$documentoid."'";
        $data=$this->select($sql);
        return $data;

    }
}

?>