<h3>Agregar un error 404</h3>
<?php
global $wpdb;
$nombre_tabla=$wpdb->prefix."mitsukaranakatta";

$envio = $_GET['envio'];
if($envio==1)
{
	echo "<b>Titulo</b>: ".$_POST["titulo"]."<br>";
	echo "<b>Mensaje</b>: ".$_POST["mensaje"]."<br>";
	echo "<b>URL Imagen</b>: ".$_POST["urlimagen"];
//$nombre_de_tabla=$wpdb->prefix."mitsukaranakatta";
$sql="INSERT INTO ".$nombre_tabla." ( `id` , `titulo` , `mensaje` , `urlimagen` )
VALUES (
NULL , '".$_POST["titulo"]."', '".$_POST["mensaje"]."','".$_POST["urlimagen"]."'
);";
$wpdb->query($sql)	;
	
}
else
{
?>
	<p>Con este formulario podras agregar los errores 404 que quieres que aparescan. Solo debes rellenar los campos que se te piden a continuacion</p>
	<form method="post" action="options-general.php?page=mitsukaranakatta/index.php&opcion=agregar&envio=1">
	<p><strong>Titulo</strong>: <input name="titulo" type="text" value="" size="30"/>
	</p>
	<p><strong><label>Mensaje</label></strong>:<br>
	<textarea name="mensaje" cols="40" rows="6">aqui tu mensaje</textarea>
	</p>
	<p><strong>URL de la imagen</strong>: <input name="urlimagen" type="text" value="" size="80" />
	</p>
	<input type="submit" name="enviar" value="Enviar">
	</form>
<?php
}

?>

