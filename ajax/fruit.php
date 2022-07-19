<?php
require_once "../models/Fruits.php";

$fruits= new fruits();

$id_fruit=isset($_POST["id_fruit"])?limpiarCadena($_POST["id_fruit"]):"";
$fruit_name=isset($_POST["fruit_name"])?limpiarCadena($_POST["fruit_name"]):"";
$price=isset($_POST["price"])?limpiarCadena($_POST["price"]):"";
$in_stock=isset($_POST["in_stock"])?limpiarCadena($_POST["in_stock"]):"";
$fruit_image=isset($_POST["fruit_image"])?limpiarCadena($_POST["fruit_image"]):"";


switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($id_fruit)){
            $rspta=$fruits->insertar($fruit_name, $price, $in_stock, $fruit_image);
            echo $rspta ? "Registered fruit ": "Not registered fruit";
        }
        else{
            $rspta=$fruits->editar($id_fruit, $fruit_name, $price, $in_stock, $fruit_image);
            echo $rspta ? "Updated fruit ": "Not updated fruit";
        }
    break;

    case 'desactivar':
        $rspta=$fruits->desactivar($id_fruit, $fruit_name, $price, $in_stock, $fruit_image);
         echo $rspta ? "desactivated fruit":" not desactivated fruit";
    break;

    case 'mostrar':
        $rspta=$fruits->mostrar($id_fruit);
        echo json_encode($rspta);
    break;

    case 'listar':
        $rspta=$fruits->listar();
        $data=Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                "0" => $reg->id_fruit,
                "1" => $reg->fruit_name,
                "2" => $reg->price,
                "3" => $reg->in_stock,
                "4" => $reg->fruit_image

            );
        }

        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
            echo json_encode($results);
    break;
}


?>