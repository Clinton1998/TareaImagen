<?php 
include_once 'app/Imagen.inc.php';
if(isset($_POST['btnsiguiente'])){
	
	$numero=rand(1,13);

	}
	if(!isset($_POST['btnsiguiente']) && !isset($_POST['btnreducir'])){
		//crearesmo una variabñe auxilia para la identificacion de la imagen
		$numero=1;
	}

	if(isset($_POST['btnreducir'])){
		$adicional=$_POST['numerito'];
		$numero=$adicional;
		$image=new Imagen("img/Clinton$numero.jpg",$_POST['txtancho'],$_POST['txtalto'],$numero);

		if($image->todoescorrecto()){
			$image->darleDimension();
		}

	}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"><!--especificamos la codificacion de caracteres (juego de caracteres)-->
<meta name="viewport" content="width=device-width, intial-scale=1">
<meta http-equiv="Description" content="Esta es un apagina de prueba con las imagenes">
	<title>
		Imagen de prueba
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<form action="<?php echo $SERVER['PHP_SELF']; ?>" method="post">
<div class="container">
	<img src="img/Clinton<?php echo $numero;?>.jpg">
	<br><br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" name="btnsiguiente" class="btn btn-info">Siguiente Imagen</button><br>
		</div>
	</div>

		
		<input type="text" name="numerito"  hidden="true" value="<?php echo $numero ?>">
		
</div>

<div class="container"><!--creamos un  contenedor de anchurra fuja que centrara la pagina--><br>

	<div class="row"><!--definimos una fila (Recuerda esto lo hacemos para que se alinea bien y padding correct0)-->
		<div class="col-md-4">
	<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title"><label>Datos de la imagen</label></h4>
	</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<label>Archivo: Clinton<?php echo $numero;?>.jpg</label>
						</div>
						
						<div class="col-md-12">
							<label><?php $arr=getimagesize("img/Clinton$numero.jpg"); 	echo $arr[3]?></label>
						</div>
						<div class="col-md-12">
								<label>Peso: <?php $peso=filesize("img/Clinton$numero.jpg");echo $peso." bytes.";?></label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1"><!--definimos una columna ademas de desplaxar columnas a la derecha desde el margen izquierdo-->
		
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4 class="panel-title"><label>Ingrese los datos</label></h4>
			</div>
			<div class="panel-body">
				<div class="row"><!--definiremos un anueva fila paraagrupar columnas-->
					<div class="col-md-6">
						<div class="form-group">   
							<label>Ancho</label>
							<input type="text" name="txtancho" class="form-control input-sm" placeholder="Ancho" value="<?php 
								if(isset($_POST['btnreducir'])){
									echo $image->mostrar_ancho();
								}?>">
								
							<?php 
							if(isset($_POST['btnreducir'])){
								$image->mostrar_error_ancho();
							}
							 ?>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Alto</label>
							<input type="text" name="txtalto" class="form-control input-sm" placeholder="Alto" value="<?php 
								if(isset($_POST['btnreducir'])){
									echo $image->mostrar_alto();
								}?>">
							<?php 
								if(isset($_POST['btnreducir'])){
									$image->mostrar_error_alto();
								}
								?>
						</div>
					</div>
				</div>
				<div class="row"><!--definiremos una nueva fila para despues opcupara con una columna-->
					<div class="col-md-12">
						<button type="submit" name="btnreducir" class="btn btn-info btn-block"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
</div>
</form>
</body>
</html>