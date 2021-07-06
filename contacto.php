<?php 

include "php/conexionDB.php";

$nombre=$_POST["name"];
$correo=$_POST["email"];
$mensaje=$_POST["message"];


 $insertar = "INSERT INTO contacto(nombre,email,mensaje) VALUES ('$nombre','$correo','$mensaje')";

    $metodo = mysqli_query($conex,$insertar);
 if(!$metodo){ echo"
          <script type='text/javascript'>

                   alert('Algo a salio mal');
                   window.location='index.html';

                 </script>";
    }else{ echo"
          <script type='text/javascript'>

                   alert('Registro exitoso');
                   window.location='index.html';

                 </script>";
    }


 ?>