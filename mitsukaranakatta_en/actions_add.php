<h3>To add an error 404</h3>
<?php
global $wpdb;
$table_name=$wpdb->prefix."mitsukaranakatta";

$envio = $_GET['envio'];
if($envio==1)
{
	echo "<b>title</b>: ".$_POST["title"]."<br>";
	echo "<b>message</b>: ".$_POST["message"]."<br>";
	echo "<b>URL Imagen</b>: ".$_POST["urlimage"];
//$nombre_de_tabla=$wpdb->prefix."mitsukaranakatta";
$sql="INSERT INTO ".$table_name." ( `id` , `title` , `message` , `urlimage` )
VALUES (
NULL , '".$_POST["title"]."', '".$_POST["message"]."','".$_POST["urlimage"]."'
);";
$wpdb->query($sql)	;
	
}
else
{
?>
	<p>With this form podras to add the errors 404 that you want that they aparescan. Single you must fill up the fields that are requested to you next</p>
	<form method="post" action="options-general.php?page=mitsukaranakatta/index.php&opcion=agregar&envio=1">
	<p><strong>title</strong>: <input name="title" type="text" value="" size="30"/>
	</p>
	<p><strong><label>message</label></strong>:<br>
	<textarea name="message" cols="40" rows="6">	
here your message </textarea>
	</p>
	<p><strong>URL of the image</strong>: <input name="urlimage" type="text" value="" size="80" />
	</p>
	<input type="submit" name="enviar" value="Send">
	</form>
<?php
}

?>

