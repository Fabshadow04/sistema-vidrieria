<?php
session_start();
ob_start();
if($_SESSION['global']==0)
{
header("Location:login.php");
}




?>

<?php
include("php/conexionDB.php");

$query1 =  "SELECT * FROM vendedor";
$resultado1 = mysqli_query($conex,$query1);

 ?>








<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Panel Administrador</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="js/jspdf.min.js">
    <link rel="stylesheet" href="js/jspdf.plugin.autotable.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Vidrieria Vargas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Inicio </a>
          </li>
        </ul>
      </div>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Salir</a>
        </li>
      </ul>
    </nav>
    <br>
        <center><font size=8 color=orange>Pedidos de vendedores</font></center>
        <br><br>

    <div class="container" id="administrador">
      <table class="table">
        <thead class="thead-dark">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegTaller">
            Agregar
          </button>

          <tr> 
            <th scope="col">ID de pedido</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Cliente</th>
            <th scope="col">Producto</th>
            <th scope="col">Modelo</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Direccion</th>
            <th scope="col">Comentario</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
      <?php

        include("php/conexionDB.php");
        $query = mysqli_query($conex,"SELECT * FROM vendedor");



        while ($row = mysqli_fetch_array($query)) {
          $datos = $row['id']."||".$row['vendedorn']."||".$row['nombre']."||".$row['producto']."||".$row['modelo']."||".$row['cantidad']."||".$row['direccion']."||".$row['comentario'];
          ?>

            <tr>

              <td><?php echo $row['id']; ?> </td>
              <td><?php echo $row['vendedorn']; ?> </td>
              <td><?php echo $row['nombre'];?>  </td>
              <td><?php echo $row['producto']; ?></td>
              <td><?php echo $row['modelo']; ?></td>
              <td><?php echo $row['cantidad']; ?></td>
              <td><?php echo $row['direccion']; ?></td>
              <td><?php echo $row['comentario']; ?></td>
              <td>
                <button type="button" class="btn btn-success edit" data-toggle="modal" data-target="#exampleModalCenter" onclick="agregarD('<?php echo $datos ?>')"> Modificar</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarT" onclick="ver('<?php echo $datos ?>')"> Eliminar</button>
              </td>
            </tr>

          <?php
        }
       ?>
       </tbody>
      </table>
    </div>

    <br><br>





  <!-- Modal Modificar -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modificar datos del pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class=""  method="post">
 

              
             <label for="">ID del pedido</label> <input type="text" class="form-control" id="id3" name="id3">
             <label for="">Vendedor</label> <input type="text" class="form-control" id="vendedor" name="vendedor">
             <label for="">Cliente</label> <input type="text" class="form-control" id="cliente" name="cliente">
             <label for="">Producto</label> <input type="text" class="form-control" id="producto" name="producto">
             <label for="">Modelo</label> <input type="text" class="form-control" id="modelo" name="modelo">
            <label for="">Cantidad</label> <input type="text" class="form-control" id="cantidad" name="cantidad">
            <label for="">Direccion</label><input type="text" class="form-control" id="direccion" name="direccion" >
            <label for="">Comentario</label><input type="text" class="form-control" id="comentario" name="comentario">
            <br>
            <button class="btn btn-primary" style="float:right" type="submit" name="daletodo">Actualizar</button>

            <?php
            include("php/conexionDB.php");

            if (isset($_POST['daletodo'])) {
              if(strlen($_POST['id3']) >= 1 && strlen($_POST['vendedor']) >= 1 && strlen($_POST['cliente']) >= 1 && strlen($_POST['producto']) >= 1 && strlen($_POST['modelo']) >= 1&& strlen($_POST['cantidad']) >= 1 && strlen($_POST['direccion']) >= 1 && strlen($_POST['comentario']) >= 1){


                $id3 = trim($_POST['id3']);
                $v = trim($_POST['vendedor']);
                $c = trim($_POST['cliente']);
                $p = trim($_POST['producto']);
                $m = trim($_POST['modelo']);
                $can = trim($_POST['cantidad']);
                $d = trim($_POST['direccion']);
                $co = trim($_POST['comentario']);

                $sql = " UPDATE vendedor SET id='$id3',
                                              vendedorn='$v',
                                              nombre='$c', 
                                              producto='$p',
                                              modelo='$m',
                                              cantidad='$can',
                                              direccion='$d',
                                              comentario='$co'
                                    WHERE id = '$id3' ";

                $execsql = mysqli_query($conex,$sql);

                if ($execsql) {
                  echo "
                  <script type='text/javascript'>

                    alert('Cambios realizados exitosamente ');
                    window.location='admin.php';

                  </script>

                  ";

                }else{

                  echo "
                  <script type='text/javascript'>

                    alert('Ocurrio un error...');
                    window.location='admin.php';

                  </script>

                  ";

                }

              }else{
                echo "
                <script type='text/javascript'>

                  alert('Hay campos vacios');
                  window.location='admin.php';

                </script>

                ";
              }
         }
            ?>

          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Registrar Taller -->
  <div class="modal fade" id="modalRegTaller" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Registrar pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class=""  method="post">
             
            <label for="">ID del pedido</label> <input type="text" class="form-control" id="id2" name="id2">
            <label for="">Vendedor</label> <input type="text" class="form-control" id="vendedorn2" name="vendedorn2">
            <label for="">Cliente</label><input type="text" class="form-control" id="nombre" name="nombre" >
            <label for="">Producto</label><input type="text" class="form-control" id="producto" name="producto">
            <label for="">Modelo</label><input type="text" class="form-control" id="modelo" name="modelo">
            <label for="">Cantidad</label><input type="text" class="form-control" id="cantidad" name="cantidad">
            <label for="">Direccion</label><input type="text" class="form-control" id="direccion" name="direccion">
            <label for="">Comentario</label><input type="text" class="form-control" id="comentario" name="comentario">
            <br>
            <button class="btn btn-primary" style="float:right" type="submit" name="registrarT">Registrar</button>
            <?php
            include("php/conexionDB.php");

            if (isset($_POST['registrarT'])) {
              if(strlen($_POST['id2']) >= 0 && strlen($_POST['vendendorn2']) >= 0 && strlen($_POST['nombre']) >= 0 && strlen($_POST['producto']) >= 0  && strlen($_POST['modelo']) >= 0 && strlen($_POST['cantidad']) >= 0 && strlen($_POST['direccion']) >= 0 && strlen($_POST['comentario']) >= 0){
                
                $i2 = trim($_POST['id2']);
                $vn = trim($_POST['vendedorn2']);
                $n = trim($_POST['nombre']);
                $p = trim($_POST['producto']);
                 $m = trim($_POST['modelo']);
                  $c = trim($_POST['cantidad']);
                  $d = trim($_POST['direccion']);
                  $c2 = trim($_POST['comentario']);

                $sql1 = " INSERT INTO vendedor(id,vendedorn,nombre, producto,modelo,cantidad,direccion,comentario) VALUES ('$i2','$vn','$n','$p','$m','$c','$d','$c2')";

                $execsql1 = mysqli_query($conex,$sql1);

                if ($execsql1) {
                  echo "
                  <script type='text/javascript'>

                    alert('Registrado con exito');
                    window.location='admin.php';

                  </script>

                  ";

                }else{

                  echo "
                  <script type='text/javascript'>

                    alert('Ocurrio un error...');
                    window.location='admin.php';

                  </script>

                  ";

                }

              }else{
                echo "
                <script type='text/javascript'>

                  alert('Hay campos vacios');
                  window.location='admin.php';

                </script>

                ";
              }
            }
            ?>

          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Elimnar Taller -->
  <div class="modal fade" id="modalEliminarT" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Eliminar pedido</h5>
          <form class="" method="post">
            <input type="text" class="form-control" id="id" name="id" readonly="readonly" >
            <br>
            <button style="float:right" name="btnDel" class="btn btn-danger" type="submit">Eliminar</button>

            <?php
            include("php/conexionDB.php");
            if (isset($_POST['btnDel'])) {
              if(strlen($_POST['id']) >= 1 ){
                $tdel = trim($_POST['id']);

                $sqlDel = " DELETE FROM vendedor WHERE id='$tdel' ";

                $execsqlDel = mysqli_query($conex,$sqlDel);

                if ($execsqlDel) {
                  echo "
                  <script type='text/javascript'>

                    alert('Eliminado con exito');
                    window.location='admin.php';

                  </script>

                  ";

                }else{

                  echo "
                  <script type='text/javascript'>

                    alert('Ocurrio un error...');
                    window.location='admin.php';

                  </script>

                  ";

                }

              }else{
                echo "
                <script type='text/javascript'>

                  alert('Hay campos vacios');
                  window.location='admin.php';

                </script>

                ";
              }
            }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function ver(datos){
      d = datos.split('||');
      $('#id').val(d[0]);
    }
  </script>


<script type="text/javascript">
  function agregarD(datos){
    d = datos.split('||');
    $('#nombreT').val(d[0]);
    $('#talleris').val(d[1]);
    $('#cupop').val(d[2]);
  }
</script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


 <center><font size=10 color=orange>Pedidos de clientes</font></center>
        <br><br>


 <div class="container" id="administrador">
      <table class="table">
        <thead class="thead-dark">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegTaller2">
            Agregar
          </button>

          <tr>

            <th scope="col">ID del pedido</th>
            <th scope="col">Cliente</th>
            <th scope="col">Producto</th>
            <th scope="col">Modelo</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Direccion</th>
            <th scope="col">Comentario</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
      <?php

        include("php/conexionDB.php");
        $query = mysqli_query($conex,"SELECT * FROM cliente");



        while ($row = mysqli_fetch_array($query)) {
          $datos = $row['id']."||".$row['nombre']."||".$row['producto']."||".$row['modelo']."||".$row['cantidad']."||".$row['direccion']."||".$row['comentario'];
          ?>

            <tr>
              
              <td><?php echo $row['id'];?>  </td>
              <td><?php echo $row['nombre'];?>  </td>
              <td><?php echo $row['producto']; ?></td>
              <td><?php echo $row['modelo']; ?></td>
              <td><?php echo $row['cantidad']; ?></td>
              <td><?php echo $row['direccion']; ?></td>
              <td><?php echo $row['comentario']; ?></td>
              <td>
                <button type="button" class="btn btn-success edit" data-toggle="modal" data-target="#exampleModalCenter2" onclick="agregarD('<?php echo $datos ?>')"> Modificar</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarT2" onclick="ver2('<?php echo $datos ?>')"> Eliminar</button>
              </td>
            </tr>

          <?php
        }
       ?>
       </tbody>
      </table>
    </div>

    <br><br>




<!-- Modal Registrar Taller -->
  <div class="modal fade" id="modalRegTaller2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Registrar pedido de cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class=""  method="post">
            <label for="">ID del pedido</label> <input type="text" class="form-control" id="id4" name="id4">
           
            <label for="">Nombre del cliente</label><input type="text" class="form-control" id="nombre" name="nombre" >
            <label for="">Producto</label><input type="text" class="form-control" id="producto" name="producto">
            <label for="">Modelo</label><input type="text" class="form-control" id="modelo" name="modelo">
            <label for="">Cantidad</label><input type="text" class="form-control" id="cantidad" name="cantidad">
            <label for="">Direccion</label><input type="text" class="form-control" id="direccion" name="direccion">
            <label for="">Comentario</label><input type="text" class="form-control" id="comentario" name="comentario">
            <br>
            <button class="btn btn-primary" style="float:right" type="submit" name="registrarT3">Registrar</button>
            <?php
            include("php/conexionDB.php");

            if (isset($_POST['registrarT3'])) {
              if(strlen($_POST['id4']) >= 0  && strlen($_POST['nombre']) >= 0 && strlen($_POST['producto']) >= 0  && strlen($_POST['modelo']) >= 0 && strlen($_POST['cantidad']) >= 0 && strlen($_POST['direccion']) >= 0 && strlen($_POST['comentario']) >= 0){
                
                $i4 = trim($_POST['id4']);
                
                $n = trim($_POST['nombre']);
                $p = trim($_POST['producto']);
                 $m = trim($_POST['modelo']);
                  $c = trim($_POST['cantidad']);
                  $d = trim($_POST['direccion']);
                  $c2 = trim($_POST['comentario']);

                $sql1 = " INSERT INTO cliente(id,nombre, producto,modelo,cantidad,direccion,comentario) VALUES ('$i4','$n','$p','$m','$c','$d','$c2')";

                $execsql1 = mysqli_query($conex,$sql1);

                if ($execsql1) {
                  echo "
                  <script type='text/javascript'>

                    alert('Registrado con exito');
                    window.location='admin.php';

                  </script>

                  ";

                }else{

                  echo "
                  <script type='text/javascript'>

                    alert('Ocurrio un error...');
                    window.location='admin.php';

                  </script>

                  ";

                }

              }else{
                echo "
                <script type='text/javascript'>

                  alert('Hay campos vacios');
                  window.location='admin.php';

                </script>

                ";
              }
            }
            ?>

          </form>
        </div>
      </div>
    </div>
  </div>




<!-- Modal Modificar -->
  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modificar datos del pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class=""  method="post">
             <label for="">ID del pedido</label> <input type="text" class="form-control" id="id4" name="id4">
             
             <label for="">Cliente</label> <input type="text" class="form-control" id="cliente4" name="cliente4">
             <label for="">Producto</label> <input type="text" class="form-control" id="producto4" name="producto4">
             <label for="">Modelo</label> <input type="text" class="form-control" id="modelo4" name="modelo4">
            <label for="">Cantidad</label> <input type="text" class="form-control" id="cantidad4" name="cantidad4">
            <label for="">Direccion</label><input type="text" class="form-control" id="direccion4" name="direccion4" >
            <label for="">Comentario</label><input type="text" class="form-control" id="comentario4" name="comentario4">
            <br>
            <button class="btn btn-primary" style="float:right" type="submit" name="daletodo2">Actualizar</button>

            <?php
            include("php/conexionDB.php");

            if (isset($_POST['daletodo2'])) {
              if(strlen($_POST['id4']) >= 1 && strlen($_POST['cliente4']) >= 1 && strlen($_POST['producto4']) >= 1 && strlen($_POST['modelo4']) >= 1&& strlen($_POST['cantidad4']) >= 1 && strlen($_POST['direccion4']) >= 1 && strlen($_POST['comentario4']) >= 1){


                $id4 = trim($_POST['id4']);
                
                $c = trim($_POST['cliente4']);
                $p = trim($_POST['producto4']);
                $m = trim($_POST['modelo4']);
                $can = trim($_POST['cantidad4']);
                $d = trim($_POST['direccion4']);
                $co = trim($_POST['comentario4']);

                $sql = " UPDATE cliente SET id='$id4',
                                             
                                              nombre='$c', 
                                              producto='$p',
                                              modelo='$m',
                                              cantidad='$can',
                                              direccion='$d',
                                              comentario='$co'
                                    WHERE id = '$id4' ";

                $execsql = mysqli_query($conex,$sql);

                if ($execsql) {
                  echo "
                  <script type='text/javascript'>

                    alert('Cambios realizados exitosamente ');
                    window.location='admin.php';

                  </script>

                  ";

                }else{

                  echo "
                  <script type='text/javascript'>

                    alert('Ocurrio un error...');
                    window.location='admin.php';

                  </script>

                  ";

                }

              }else{
                echo "
                <script type='text/javascript'>

                  alert('Hay campos vacios');
                  window.location='admin.php';

                </script>

                ";
              }
         }
            ?>

          </form>
        </div>
      </div>
    </div>
  </div>




 <!-- Modal Elimnar Taller -->
  <div class="modal fade" id="modalEliminarT2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Eliminar pedido</h5>
          <form class="" method="post">
            <input type="text" class="form-control" id="idc" name="idc" readonly="readonly" >
            <br>
            <button style="float:right" name="btnDel2" class="btn btn-danger" type="submit">Eliminar</button>

            <?php
            include("php/conexionDB.php");
            if (isset($_POST['btnDel2'])) {
              if(strlen($_POST['idc']) >= 1 ){
                $tdel = trim($_POST['idc']);

                $sqlDel = " DELETE FROM cliente WHERE id='$tdel' ";

                $execsqlDel = mysqli_query($conex,$sqlDel);

                if ($execsqlDel) {
                  echo "
                  <script type='text/javascript'>

                    alert('Eliminado con exito');
                    window.location='admin.php';

                  </script>

                  ";

                }else{

                  echo "
                  <script type='text/javascript'>

                    alert('Ocurrio un error...');
                    window.location='admin.php';

                  </script>

                  ";

                }

              }else{
                echo "
                <script type='text/javascript'>

                  alert('Hay campos vacios');
                  window.location='admin.php';

                </script>

                ";
              }
            }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>




<center><font size=10 color=orange>Mensajes de posibles clientes</font></center>
        <br><br>


 <div class="container" id="administrador">
      <table class="table">
        <thead class="thead-dark">
          

          <tr>

            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Mensaje</th>
            <th scope="col">Acciones</th>
            
          </tr>
        </thead>
        <tbody>
      <?php

        include("php/conexionDB.php");
        $query = mysqli_query($conex,"SELECT * FROM contacto");



        while ($row = mysqli_fetch_array($query)) {
          $datos = $row['nombre']."||".$row['email']."||".$row['mensaje'];
          ?>

            <tr>
              
              <td><?php echo $row['nombre'];?>  </td>
              <td><?php echo $row['email'];?>  </td>
              <td><?php echo $row['mensaje']; ?></td>

              
              <td>
                
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarc" onclick="verc('<?php echo $datos ?>')"> Eliminar</button>
              </td>
            </tr>

          <?php
        }
       ?>
       </tbody>
      </table>
    </div>

    <br><br>


 <!-- Modal Elimnar Taller -->
  <div class="modal fade" id="modalEliminarc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Eliminar pedido</h5>
          <form class="" method="post">
            <input type="text" class="form-control" id="nombre4" name="nombre4" readonly="readonly" >
            <br>
            <button style="float:right" name="btnDel" class="btn btn-danger" type="submit">Eliminar</button>

            <?php
            include("php/conexionDB.php");
            if (isset($_POST['btnDel'])) {
              if(strlen($_POST['nombre4']) >= 1 ){
                $tdel = trim($_POST['nombre4']);

                $sqlDel = " DELETE FROM contacto WHERE nombre='$tdel' ";

                $execsqlDel = mysqli_query($conex,$sqlDel);

                if ($execsqlDel) {
                  echo "
                  <script type='text/javascript'>

                    alert('Eliminado con exito');
                    window.location='admin.php';

                  </script>

                  ";

                }else{

                  echo "
                  <script type='text/javascript'>

                    alert('Ocurrio un error...');
                    window.location='admin.php';

                  </script>

                  ";

                }

              }else{
                echo "
                <script type='text/javascript'>

                  alert('Hay campos vacios');
                  window.location='admin.php';

                </script>

                ";
              }
            }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function verc(datos){
      d = datos.split('||');
      $('#nombre4').val(d[0]);
    }
  </script>

      













  <script type="text/javascript">
    function ver2(datos){
      d = datos.split('||');
      $('#idc').val(d[0]);
    }
  </script>


<script type="text/javascript">
  function agregarD(datos){
    d = datos.split('||');
    $('#nombreT').val(d[0]);
    $('#talleris').val(d[1]);
    $('#cupop').val(d[2]);
  }
</script>




  </body>
</html>
