<?php 

include "php/conexionDB.php";


$id=$_POST["id"];
$nombre=$_POST["nombre"];
$producto=$_POST["producto"];
$modelo=$_POST["modelo"];
$cantidad=$_POST["cantidad"];
$direccion=$_POST["direccion"];
$comentario=$_POST["comentario"];

 $insertar = "INSERT INTO cliente(id,nombre,producto,modelo,cantidad,direccion,comentario) VALUES ('$id','$nombre','$producto','$modelo','$cantidad','$direccion','$comentario')";

    $metodo = mysqli_query($conex,$insertar);
 if(!$metodo){ echo"
          <script type='text/javascript'>

                   alert('Algo a salio mal');
                   window.location='formulario_cliente.html';

                 </script>";
    }else{ echo"
          <script type='text/javascript'>

                   alert('Registro exitoso');
                   window.location='formulario_cliente.html';

                 </script>";
    }


 ?>