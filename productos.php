<?php 
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Productos</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<style>
		body{background-color: #F7F9FA;padding: 0px;font-family: Arial;}
		
		#menu{
			background-color: #000;

		}

		#menu ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#menu ul li{
			display: inline-block;
		}

		#menu ul li a{
			color: #D7E0E6;
			display: block;
			padding: 20px 20px;
			text-decoration: none;
		}

		#menu ul li a:hover{
			background-color: #DEA394;
		}

		.item-r{
			float: right;
		}
	</style>






  </head>
  <body>


<div id="menu">
		<ul>
			<li><a href="index.html">Inicio</a></li>
			<li><a href="formulariov.html">Vendedor</a></li>
			<li><a href="formulario_cliente.html">Cliente</a></li>
			
		</ul> </div>
<br><br>



<h1 align="center">          Tipos de cristales  </h1>
 <font size=4><p align="center" >  Contamos con una gran variedad de cristales para nuestros clientes como son: cristal simple, doble encristalamiento, triple encristalamiento </p> </font>




<h2 align="center">     Cristal simple  </h2>

<font size=4> <p align="center">Se caracteriza por ser los cristales más básicos, que por lo general son instalados en ventanas corredizas o que poseen una calidad baja,  <br> las cuales no necesitan propiedades aislantes, de seguridad o acústicas.
  </p></font>


<h2 align="center">     Doble aislamiento  </h2>

<font size=4> <p align="center">Es fabricado con dos cristales que se encuentran separados mediante una cámara estanca, la cual, de acuerdo a su composición y grosor, <br> aísla más o menos el interior del inmueble frente a los ruidos, al mismo tiempo que impide que la temperatura externa llegue al interior.
 </p></font>


<h2 align="center">     Triple aislamiento  </h2>

<font size=4> <p align="center"> Destaca por ser un sistema que por lo general es utilizado para instalaciones especiales,consiste en agregar una mayor cantidad de cristales al <br> acristalamiento doble, logrando aumentar de esta forma no solo las prestaciones térmicas que ofrece la ventana, sino también las acústicas.
 </p></font>

  	<div class='container'>
		<div class="row">
			<div class="col-lg-12">
				 <h1 class="page-header">Productos</h1>
			<?php
				$nums=1;
				$sql_banner_top=mysqli_query($con,"select * from banner where estado=1 order by orden ");
				while($rw_banner_top=mysqli_fetch_array($sql_banner_top)){
					?>
					
					<div class="col-lg-3 col-md-4 col-xs-6 thumb">
						<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="<?php echo $rw_banner_top['titulo'];?>" data-caption="<?php echo $rw_banner_top['descripcion'];	?>" data-image="img/banner/<?php echo $rw_banner_top['url_image'];?>" data-target="#image-gallery">
							<img class="img-responsive" src="img/banner/<?php echo $rw_banner_top['url_image'];?>" alt="Another alt text">
						</a>
					</div>
					<?php
					
					if ($nums%4==0){
						echo '<div class="clearfix"></div>';
					}
					$nums++;
				}
			?>
						
			</div>
		</div>
<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
			<center>
                <img id="image-gallery-image" class="img-responsive" src="">
			</center>	
            </div>
            <div class="modal-footer">

                <div class="col-md-2">
                    <button type="button" class="btn btn-info" id="show-previous-image">Anterior</button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>

                <div class="col-md-2">
                    <button type="button" id="show-next-image" class="btn btn-info">Siguiente</button>
                </div>
            </div>
        </div>
    </div>
</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	
  	<script>
	$(document).ready(function(){
    loadGallery(true, 'a.thumbnail');
    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }
    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
	</script>
  
  </body>
</html>


