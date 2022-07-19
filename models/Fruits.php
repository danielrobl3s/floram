<?php 
require "../conexion.php";

class fruits
{
    public function __construct()
    {
        
    }

    public function insertar($fruit_name, $price, $in_stock, $fruit_image)
    {
        $sql = "INSERT INTO fruits (fruit_name, price, in_stock, fruit_image) VALUES ('$fruit_name', '$price', '$in_stock', '$fruit_image')";
        return ejecutarConsulta($sql);
    }

    public function editar($id_fruit, $fruit_name, $price, $in_stock, $fruit_image)
    {
        $sql = "UPDATE fruits SET fruit_name='$fruit_name', price='$price', in_stock='$in_stock' WHERE id_fruit='$id_fruit'";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id_fruit)
    {
        $sql="UPDATE fruits SET condicion = '0' WHERE id_fruit = '$id_fruit'";
        return ejecutarConsulta($sql);
    }

    public function activar($id_fruit)
    {
        $sql="UPDATE fruits SET condicion = '1' WHERE id_fruit = '$id_fruit'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id_fruit)
    {
        $sql="SELECT * FROM fruits";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql="SELECT * FROM fruits";
        return ejecutarConsulta($sql);
    }
}

?>