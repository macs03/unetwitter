<? 
session_start();    include('conexion.php');
 if(isset($_SESSION["usuario"])){
  session_destroy();
 }
if(isset($_POST['entrar'])){
	 $link=conectar();
   $sql="SELECT * FROM usuario WHERE nick='".$_POST["login"]."' and contrasena = '".$_POST["password"]."';";
	 if($res=mysql_query($sql)){
		  if($con=mysql_fetch_array($res)){
			$_SESSION['id']=$con[0];
			 $_SESSION['usuario']=$con[1];
			 $_SESSION['nick']=$con[4];
			 ?>
			 <script>
				document.location='inicio.php';
			 </script>
			 <?
		  }else{
		    $_SESSION["mensaje"]="usuario invalido";
	      }  
  	  }

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
	
		<form method="post" name="form1" id="form1">
			<div class="login">
			<div class="texto">
			<label>Iniciar Sesion</label>
			</div>
			<div class="texto">
			<label>Usuario</label>
			</div>
			<div class="campo">
			<input type="text" name="login" id="textfield" />
			</div>
			
			<div class="texto">
			<label>Contraseña</label>
			</div>
			<div class="campo">
			<input type="password" name="password" id="textfield2" />
			</div>
			<input type="submit" style="margin-top: 10px; margin-left: 10px;" name="entrar" id="entrar" value="ENTRAR" />
			
			<a href="registro.php">Registrarse</a>
			</div>
			
		</form>
	</div>
	</body>
</html>
