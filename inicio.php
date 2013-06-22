<? session_start();  include('conexion.php');
 if(!isset($_SESSION['usuario'])){
  ?>
   <script>
		document.location='index.php';
	</script>
  <?
 }
if(isset($_POST['tweet'])){
if($_POST['twit']==NULL){
?>
	   <script>
		alert("NO PUEDE PUBLICAR UN TWEET VACIO");
	</script>
	<?
}else{
		$link=conectar();	
		$sql="INSERT INTO twit VALUES (NULL ,  '".$_SESSION['id']."',  '".$_POST['twit']."',  '".date("Y-m-d")."',  '".date("H:i:s")."') ; ";
		$res=mysql_query($sql,$link);
			
		?>
		
		   <script>
		document.location='inicio.php';
	</script>
		<?
		}
}
?>

 <script>
	function validar(var){
		if()
	
	}
			 </script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<LINK rel=stylesheet type="text/css" href="estilos.css">
	<title>UNETwitter</title>
	</head>
	<body class="body">
	<div class="contenedor">
		<a href="inicio.php">
		<div class="cabecera">
		</div>
		</a>
	
				<div class="menu">
				<div class="texto" style="margin-top:5px;">
				<label>Bienvenido: <?=$_SESSION['usuario'];?></label>
				</div>
				<div class="salir">
				<a href="index.php"> Buscar </a>
					<a href="index.php"> Salir </a>
				</div>
				</div>
	<form method="post" name="form1" id="form1">
	<div class="text">
		<div class="titulotwitter">
		<div class="texto" style="margin-left:20px; width:250px;">
			<label>¿Qué está pasando?</label>
			</div>
		<div class="textarea">
			<textarea id="twit" name="twit" cols="55" rows="6" onKeyPress=""></textarea>
		</div>
		<input type="submit" style="float:right; margin-top:5px; margin-right:10px;" name="tweet" id="tweet" value="Tweet" />
		</div>
		
		<? 	
		$link=conectar();
		$sql="SELECT * FROM twit WHERE Usuario_idUsuario = '".$_SESSION['id']."' ORDER BY fecha; ";
		if($res=mysql_query($sql,$link)){
			while($con=mysql_fetch_array($res)){?>
			<div class="tweets">
			<img src="user.png" WIDTH="66" HEIGHT="66" />
			<div class="texto" style="margin-left:10px; width:414px;	height:40px; font-size: 14px;">
			<label><?=$_SESSION['nick'].": ".$con[2]?></label>
			
			</div>
			<div class="texto" style="margin-left:20px; width:414px;	height:auto; font-size: 14px;">
			<label><?="Fecha: ".$con[3]?></label>
			
			</div>
		</div>
		<?}}?>
	
	</div>
	<div class="seguidores">
	<div class="texto"style="margin-left:20px;">
			<label>Usuarios:</label>
	</div>
		
		<?
		$link=conectar();
		$sql="SELECT * FROM usuario WHERE idUsuario!='".$_SESSION['id']."' ";
		if($res=mysql_query($sql,$link)){
			while($con=mysql_fetch_array($res)){?>	
		
		<div class="usuario">
		<img src="user.png" WIDTH="44" HEIGHT="44" />
		<div class="texto" style="width: 150px">
			<label><a href="#"><?=$con[1]?></a></label>
			<a href="#" style="font-size:12px"> -> Seguir</a>
		</div>	
		<?}}?>
	
	</div>	
	
	</div>
	</form>
	</div>
	</body>
</html>
