<?php 

include "php/conexionDB.php";


$id=$_POST["id"];
$vendedor=$_POST["vendedor"];
$nombre=$_POST["nombre"];
$producto=$_POST["producto"];
$modelo=$_POST["modelo"];
$cantidad=$_POST["cantidad"];
$direccion=$_POST["direccion"];
$comentario=$_POST["comentario"];

 $insertar = "INSERT INTO vendedor(id,vendedorn,nombre,producto,modelo,cantidad,direccion,comentario) VALUES ('$id','$vendedor','$nombre','$producto','$modelo','$cantidad','$direccion','$comentario')";

    $metodo = mysqli_query($conex,$insertar);
 if(!$metodo){ echo"
          <script type='text/javascript'>

                   alert('Algo salio mal');
                   window.location='formulariov.html';

                 </script>";
    }else{ echo"
          <script type='text/javascript'>

                   alert('Registro exitoso');
                   window.location='formulariov.html';

                 </script>";
    }


 ?>