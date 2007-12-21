<?php
?>
<div class="wrap">
	<h2>Configuracion de mitsukaranakatta</h2>
	<div id="menu" align="justify">
		<a href="options-general.php?page=mitsukaranakatta/index.php&opcion=agregar">Agregar</a> |       
		<a href="options-general.php?page=mitsukaranakatta/index.php&opcion=editar">Editar</a> | (by <a href="http://jorgelig.la100rra.com.mx/">Jorgelig</a>)
	</div>
	
	
<?php
if(!isset($_GET['opcion'])) {
		$opcion = "noaction";
	} else {
		$opcion=$_GET['opcion'];
	};
switch($opcion)
{
	case 'agregar':
		include('acciones_agregar.php');
		break;
	case 'editar':
		include('acciones_editar.php');
		break;
	default:
		include('acciones_default.php');
		break;
	
}
//if($action=='agregar'){include('acciones_agregar.php');}
?>
<br /><br />
<a href="http://jorgelig.la100rra.com.mx/2007/07/02/mi-primer-plugin-para-wordpress-mitsukaranakatta/">Pagina de mitsukaranakatta</a>
</div>