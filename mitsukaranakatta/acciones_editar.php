<h3>Formulario de Edicion de errores</h3>
<?php
global $wpdb;
$nombre_tabla=$wpdb->prefix."mitsukaranakatta";

$envio=$_GET['accion'];
$envio2=$_POST['accion'];
echo "envio:".$envio."<br>";
if($envio=='actualizar')
{
	$id=$_GET['id'];
	$titulo=$_POST['titulo'];
	$mensaje=$_POST['mensaje'];
	$urlimagen=$_POST['urlimagen'];
	$sql="UPDATE ".$nombre_tabla." SET titulo='$titulo', mensaje='$mensaje', urlimagen='$urlimagen' WHERE id='$id'";
	$wpdb->query($sql);
	echo "<h4>Campos actualizados</h4><br>";
	echo "<strong>ID</strong>: ".$id."<br>";
	echo "<strong>Titulo</strong>: ".$titulo."<br>";
	echo "<strong>Mensaje</strong>: ".$mensaje."<br>";
	echo "<strong>URL imagen</strong>: ".$urlimagen."<br>";
	echo "<strong>SQL</strong>: ".$sql."<br>";
	echo "<strong>Mensaje Actualizado correctamente</strong>";	
	
}
if($envio=='eliminar')
{
	$id=$_GET['id'];
	$sql="DELETE FROM ".$nombre_tabla." WHERE id='$id'";
	$wpdb->query($sql);
	echo "Registro numero <strong>".$id."</strong> eliminado correctamente";
}
if($envio=='mostrar')
{
	$id=$_GET['id'];
	$titulo=$_GET['titulo'];
	$mensaje=$_GET['mensaje'];
	$urlimagen=$_GET['urlimagen'];	
	echo "<h4>Edita los campos de tu interes</h4>";
	echo $id." | ".$titulo." | ".$mensaje." | ".$urlimagen;
	echo "<form method='post' action='options-general.php?page=mitsukaranakatta/index.php&opcion=editar&id=$id&accion=actualizar'>
	<p><strong>ID</strong>: $id</p>
	<p><strong>Titulo</strong>: <input name='titulo' type='text' value='$titulo' size='30'/>
		</p>
	<p><strong><label>Mensaje</label></strong>:<br>
	<textarea name='mensaje' cols='40' rows='6'>$mensaje</textarea>
	</p>
	<p><strong>URL de la imagen</strong>: <input name='urlimagen' type='text' value='$urlimagen' size='80' />
	</p>
	<input type='submit' name='enviar' value='Enviar'>
	</form>

";
?>

<?php
}
else{
	echo "<h4>Porfavor selecciona el error 404 que deseas editar:</h4>";
	$sql="SELECT * FROM ".$nombre_tabla." mitsukaranakatta";
	$resultados=$wpdb->get_results($sql);
	echo "
<table class='widefat plugins'>";
	echo "
	<thead>
		<tr>
			<th>ID</th>
			<th>Titulo</th>
			<th>Mensaje</th>
			<th>URL de la Imagen</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>";
	foreach($resultados as $fila)
	{
		$id=$fila->id;		
		$titulo=$fila->titulo;
		$mensaje=$fila->mensaje;
		$urlimagen=$fila->urlimagen;
		echo "<tr class='alternate'>
			";

		echo "<td>".$id."</td>
			";
		echo "<td>".$titulo."</td>
			";
		echo "<td>".$mensaje."</td>
			";
		echo "<td>".$urlimagen."</td>
			";
		echo "<td><a href='options-general.php?page=mitsukaranakatta/index.php&opcion=editar&accion=mostrar&id=".$id."&titulo=".$titulo."&mensaje=".$mensaje."&urlimagen=".$urlimagen."'>Editar</a></td>";
		echo "<td><a href='options-general.php?page=mitsukaranakatta/index.php&opcion=editar&accion=eliminar&id=".$id."&titulo=".$titulo."&mensaje=".$mensaje."&urlimagen=".$urlimagen."'>Eliminar</a></td>";
	}
	echo "
	</tbody>
</table>";
	
	
}


?>