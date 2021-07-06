<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Iniciar Sesi&oacute;n </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/javascript" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">Regresar a pagina principal</a>
     
    </nav>
    <br><br><br>
    <div class="text-center">
      <form class="form"  method="post">
        <img src="imagenes/img_login.png" >
        <h2>Inicie Sesi&oacute;n</h2>
        <div class="container">
            <label class="sr-only">Usuario</label>
            <input type="text" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
            <br>
            <label class="sr-only">Contrase&ntilde;a</label>
            <input type="password" name="pass" class="form-control" placeholder="Contrase&ntilde;a" required>
        </div>
        <br>
        <input type="submit" name="dale" class="btn btn-primary" value="Enviar" />
        <?php
        include("php/conexionDB.php");

        if(isset($_POST['dale'])) {

         session_start();
         ob_start();
          $user = $_POST['usuario'];
          $pass = $_POST['pass'];
           $_SESSION['global']=0;


          $query = mysqli_query($conex,"SELECT * FROM administrador WHERE user = '$user' AND pass = '$pass'");

          if(!$query){
            echo mysqli_error($mysqli);
            exit;
          }

          if($user = mysqli_fetch_assoc($query)){


              $_SESSION['global']=1;          

            echo "
            <script type='text/javascript' >

              alert('Bienvenido al sistema');

            window.location='admin.php';
            </script>

            ";
          }else {

            echo "
            <script type='text/javascript' >

              alert('Usuario y/o incorrectos');

            //window.location='administrador.php';
            </script>

            ";

          }

        }

         ?>
          <p class="mt-5 mb-3 text-muted">&copy; Sistema de ventas</p>
      </form>
    </div>


    <div class="modal fade" id="modal_mensaje" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"> Bienvenido <?php echo $user ; ?> </h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  </body>
</html>