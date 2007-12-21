<h3>Edition form of errors</h3>
<?php
global $wpdb;
$table_name=$wpdb->prefix."mitsukaranakatta";

$send=$_GET['action'];
if($send=='update')
{
	$id=$_GET['id'];
	$title=$_POST['title'];
	$message=$_POST['message'];
	$urlimage=$_POST['urlimage'];
	$sql="UPDATE ".$table_name." SET title='$title', message='$message', urlimage='$urlimage' WHERE id='$id'";
	$wpdb->query($sql);
	echo "<h4>Updated fields</h4><br>";
	echo "<strong>ID</strong>: ".$id."<br>";
	echo "<strong>title</strong>: ".$title."<br>";
	echo "<strong>message</strong>: ".$message."<br>";
	echo "<strong>URL image</strong>: ".$urlimage."<br>";
	echo "<strong>SQL</strong>: ".$sql."<br>";
	echo "<strong>Message Updated correctly</strong>";	
	
}
if($send=='erase')
{
	$id=$_GET['id'];
	$sql="DELETE FROM ".$table_name." WHERE id='$id'";
	$wpdb->query($sql);
	echo "registry I number <strong>".$id."</strong> erasure correctly";
}
if($send=='show')
{
	$id=$_GET['id'];
	$title=$_GET['title'];
	$message=$_GET['message'];
	$urlimage=$_GET['urlimage'];	
	echo "<h4>Edita los campos de tu interes</h4>";
	echo $id." | ".$title." | ".$message." | ".$urlimage;
	echo "<form method='post' action='options-general.php?page=mitsukaranakatta/index.php&opcion=editar&id=$id&action=update'>
	<p><strong>ID</strong>: $id</p>
	<p><strong>title</strong>: <input name='title' type='text' value='$title' size='30'/>
		</p>
	<p><strong><label>message</label></strong>:<br>
	<textarea name='message' cols='40' rows='6'>$message</textarea>
	</p>
	<p><strong>URL de la image</strong>: <input name='urlimage' type='text' value='$urlimage' size='80' />
	</p>
	<input type='submit' name='send' value='Send'>
	</form>

";
?>

<?php
}
else{
	echo "<h4>Porfavor selecciona el error 404 que deseas editar:</h4>";
	$sql="SELECT * FROM ".$table_name." mitsukaranakatta";
	$resultados=$wpdb->get_results($sql);
	echo "
<table class='widefat plugins'>";
	echo "
	<thead>
		<tr>
			<th>ID</th>
			<th>title</th>
			<th>message</th>
			<th>URL de la image</th>
			<th>Editar</th>
			<th>erase</th>
		</tr>
	</thead>
	<tbody>";
	foreach($resultados as $fila)
	{
		$id=$fila->id;		
		$title=$fila->title;
		$message=$fila->message;
		$urlimage=$fila->urlimage;
		echo "<tr class='alternate'>
			";

		echo "<td>".$id."</td>
			";
		echo "<td>".$title."</td>
			";
		echo "<td>".$message."</td>
			";
		echo "<td>".$urlimage."</td>
			";
		echo "<td><a href='options-general.php?page=mitsukaranakatta/index.php&opcion=editar&action=show&id=".$id."&title=".$title."&message=".$message."&urlimage=".$urlimage."'>Editar</a></td>";
		echo "<td><a href='options-general.php?page=mitsukaranakatta/index.php&opcion=editar&action=erase&id=".$id."&title=".$title."&message=".$message."&urlimage=".$urlimage."'>erase</a></td>";
	}
	echo "
	</tbody>
</table>";
	
	
}


?>