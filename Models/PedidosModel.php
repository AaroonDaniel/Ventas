<?php
class PedidosModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function buscarCliente(string $documentoid)
    {
        $sql = "select * from clientes where documentoid='" . $documentoid . "'";
        $data = $this->select($sql);
        return $data;
    }
    public function buscarProducto(string $codigo)
    {
        $sql = "SELECT p.*, m.descripcion_corta, m.unidad_siat
            FROM productos p
            INNER JOIN medidas m ON m.id_medida = p.id_medida
            WHERE p.codigo = '" . $codigo . "'";
        $data = $this->select($sql);
        return $data;
    }
}
