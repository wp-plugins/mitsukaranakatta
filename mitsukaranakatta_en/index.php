<?php
?>
<div class="wrap">
	<h2>Configuration of mitsukaranakatta</h2>
	<div id="menu" align="justify">
		<a href="options-general.php?page=mitsukaranakatta/index.php&option=add">Adding</a> |       
		<a href="options-general.php?page=mitsukaranakatta/index.php&option=edit">Edit</a> | (by <a href="http://jorgelig.la100rra.com.mx/">Jorgelig</a>)
	</div>
	
	
<?php
if(!isset($_GET['option'])) {
		$option = "noaction";
	} else {
		$option=$_GET['option'];
	};
switch($option)
{
	case 'add':
		include('actions_add.php');
		break;
	case 'edit':
		include('actions_edit.php');
		break;
	default:
		include('actions_default.php');
		break;
	
}
?>
<br /><br />
<a href="http://jorgelig.la100rra.com.mx/2007/07/02/mi-primer-plugin-para-wordpress-mitsukaranakatta/">site oficial of mitsukaranakatta</a>
</div>