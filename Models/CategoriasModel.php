?php
class CategoriasModel extends Query{
    private $nombre_categoria, $codigoProductoSin, $id_categoria, $estado;
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias(){
        $sql="select *  
        from categorias";
        $data=$this->selectAll($sql);
        return $data;
    }

    public function registrarCategoria(string $nombre_categoria, string $codigoProductoSin){
        $this->nombre_categoria=$nombre_categoria;
        $this->codigoProductoSin=$codigoProductoSin;
        $sql="insert into categorias (nombre_categoria,codigoProductoSin) values (?,?)";
        $datos=array($this->nombre_categoria,$this->codigoProductoSin);
        $data=$this->save($sql,$datos);
        if($data==1){
            $res="ok";
        }else{
            $res="error";
        }
        return $res;
    }

    public function editarCategoria(int $id){
        $sql="select * from categorias where id_categoria='".$id."'";
        $data=$this->select($sql);
        return $data;
    }

    public function modificarCategoria(string $nombre_categoria, string $codigoProductoSin, int $id_categoria){
        $this->id_categoria = $id_categoria;
        $this->nombre_categoria=$nombre_categoria;
        $this->codigoProductoSin=$codigoProductoSin;
        $sql="update categorias set nombre_categoria=?, codigoProductoSin=? where id_categoria=?";
        $datos=array($this->nombre_categoria,$this->codigoProductoSin,$this->id_categoria);
        $data=$this->save($sql,$datos);
        if($data==1){
            $res="modificado";
        }else{
            $res="error";
        }
        return $res;
    }

    public function accion(int $estado, int $id){
        $this->id_categoria = $id;
        $this->estado = $estado;
        $sql = "update categorias set categoria_estado=? where id_categoria=?";
        $datos=array($this->estado,$this->id_categoria);
        $data=$this->save($sql,$datos);
        return $data;
    }
}
?>