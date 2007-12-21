<?php 
/*
Plugin Name: Mitsukaranakatta
Plugin URI: http://jorgelig.la100rra.com.mx/
Description: Este sencillo plug genera aleatoriamente mensajes para los errores 404.
Version: 1.0
Author: Jorgelig
Author URI: http://jorgelig.la100rra.com.mx/
*/

/*  Copyright 2007  Jorgelig  (email : jorgeligg@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

//Esta funcion crea la Tabla necesaria para el funcionamiento del Plugin e instala el Plug
add_action('activate_mitsukaranakatta/mitsukaranakatta.php','install_mitsukaranakatta');
function install_mitsukaranakatta()
{

	global $wpdb;
	//determinando el prefijo de la BD y asignandole un nombre a nuestra tabla
	$nombre_de_tabla=$wpdb->prefix."mitsukaranakatta";
	//si la tabla no existe la creamos
	if($wpdb->get_var("show table like '$nombre_de_tabla'")!=$nombre_de_tabla)
	{
		$sql="CREATE TABLE ".$nombre_de_tabla." (
`id` BIGINT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`titulo` TEXT NOT NULL ,
`mensaje` TEXT NOT NULL ,
`urlimagen` TEXT NOT NULL
) ENGINE = MYISAM ;";

	$wpdb->query($sql);
	}
}
	
//Funcion que desinstala el plug y elimina la tabla del Plug
add_action('deactivate_mitsukaranakatta/mitsukaranakatta.php', 'uninstall_mitsukaranakatta');
function uninstall_mitsukaranakatta(){
	global $wpdb;

	$nombre_de_tabla=$wpdb->prefix."mitsukaranakatta";
	$sql="DROP TABLE ".$nombre_de_tabla;
	$wpdb->query($sql);
}

add_action('admin_menu', 'mitsukaranakatta_admin_panel');
function mitsukaranakatta_admin_panel(){
add_submenu_page('options-general.php', 'mitsukaranakatta', 'mitsukaranakatta', 8, 'mitsukaranakatta/index.php');

}

class mitsukaranakatta{
var $titulo;
var $mensaje;
var $url_imagen;

	function mitsukaranakatta(){
		global $wpdb;
		$numero_errores=$wpdb->get_results("SELECT * FROM ".$wpdb->prefix."mitsukaranakatta");
		$num_max_items=count($numero_errores);
		$id=rand(1,$num_max_items);
		$resultados=$wpdb->get_results("SELECT * FROM ".$wpdb->prefix."mitsukaranakatta"." WHERE id LIKE '$id'");
	foreach($resultados as $fila)
		{
			$this->titulo=$fila->titulo;
			$this->mensaje=$fila->mensaje;
			$this->url_imagen=$fila->urlimagen;
		}
	}
	
	function titulo(){
		echo $this->titulo;
	}
	
	function mensaje(){
		echo $this->mensaje;
	}
	
	function url_imagen(){
		echo $this->url_imagen;			
	}
}
?>