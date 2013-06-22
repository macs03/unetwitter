<? 
session_start();    include('conexion.php');
if(isset($_POST['registrar'])){
	 $link=conectar();
   $sql="INSERT INTO usuario VALUES (NULL, '".$_POST['nombre']."', '".$_POST['correo']."', '".$_POST['pswd']."', '".$_POST['nick']."');";
   $con=mysql_query($sql);
  $sql="SELECT * FROM usuario WHERE nick='".$_POST["login"]."' and contrasena = '".$_POST["password"]."';";
     $res=mysql_query($sql);
	 ?>
	  <script>
				alert("Usuario Registrado");
			 </script>
	 <?
	 $con=mysql_fetch_array($res);
			 $_SESSION['id']=$con[0];
			 $_SESSION['usuario']=$con[1];
			 $_SESSION['nick']=$con[4];
		 ?>
			 <script>
				document.location='index.php';
			 </script>
			 <?
			
			
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<LINK rel=stylesheet type="text/css" href="estilos.css">
	<title>UNETwitter</title>
	</head>
	<body class="body">
	<div class="contenedor">
		<a href="index.php">
		<div class="cabecera">
		</div>
		</a>
	
		<form  method="post" name="form1" id="form1">
		<div class="registro">
		<div class="texto" style="	margin-top:5px;">
			<img src="paja.jpg" WIDTH="40" HEIGHT="40" /><label>REGISTRO DE USUARIO</label>
			</div>
		<div class="texto"style="	margin-top:35px;">
			<label>Nombre</label>
			</div>
			<div class="campo">
			<input type="text" size="60" name="nombre" id="nombre" />
			</div>
			<div class="texto">
			<label>Correo</label>
			</div>
			<div class="campo">
			<input type="text" size="60" name="correo" id="correo" />
			</div>
			<div class="texto">
			<label>Cotraseña</label>
			</div>
			<div class="campo">
			<input type="password" size="60" name="pswd" id="pswd" />
			</div>
			<div class="texto">
			<label>Nick</label>
			</div>
			<div class="campo">
			<input type="text" size="60" name="nick" id="nick" />
			</div>
			<input type="submit" style="float:right; margin-top:5px; margin-right:10px;"  name="registrar" id="registrar" value="Registrarse" />
		</div>
			</form>
	</div>
	</body>
</html>
