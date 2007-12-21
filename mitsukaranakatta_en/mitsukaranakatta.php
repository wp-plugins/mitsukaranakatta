<?php 
/*
Plugin Name: Mitsukaranakatta
Plugin URI: http://jorgelig.la100rra.com.mx/
Description: This simple plug generates messages for errors 404 randomly. 
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

//This function creates the necessary Table for the operation of the Plugin and installs the Plug
add_action('activate_mitsukaranakatta/mitsukaranakatta.php','install_mitsukaranakatta');
function install_mitsukaranakatta()
{

	global $wpdb;
	//determining the table area code of the BD and assigning to name to our 
	$table_name=$wpdb->prefix."mitsukaranakatta";
	//if the table does not exist we created it 
	if($wpdb->get_var("show table like '$table_name'")!=$table_name)
	{
		$sql="CREATE TABLE ".$table_name." (
`id` BIGINT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`title` TEXT NOT NULL ,
`message ` TEXT NOT NULL ,
`urlimage ` TEXT NOT NULL
) ENGINE = MYISAM ;";

	$wpdb->query($sql);
	}
}
	
//Function that desinstala plug and eliminates the table of the Plug
add_action('deactivate_mitsukaranakatta/mitsukaranakatta.php', 'uninstall_mitsukaranakatta');
function uninstall_mitsukaranakatta(){
	global $wpdb;

	$table_name=$wpdb->prefix."mitsukaranakatta";
	$sql="DROP TABLE ".$table_name;
	$wpdb->query($sql);
}

add_action('admin_menu', 'mitsukaranakatta_admin_panel');
function mitsukaranakatta_admin_panel(){
add_submenu_page('options-general.php', 'mitsukaranakatta', 'mitsukaranakatta', 8, 'mitsukaranakatta/index.php');

}

class mitsukaranakatta{
var $title;
var $message ;
var $url_image ;

	function mitsukaranakatta(){
		global $wpdb;
		$number_errors=$wpdb->get_results("SELECT * FROM ".$wpdb->prefix."mitsukaranakatta");
		$num_max_items=count($number_errors);
		$id=rand(1,$num_max_items);
		$results=$wpdb->get_results("SELECT * FROM ".$wpdb->prefix."mitsukaranakatta"." WHERE id LIKE '$id'");
	foreach($results as $fila)
		{
			$this->title=$fila->title;
			$this->message =$fila->message ;
			$this->url_image =$fila->urlimage ;
		}
	}
	
	function title(){
		echo $this->title;
	}
	
	function message (){
		echo $this->message ;
	}
	
	function url_image (){
		echo $this->url_image ;			
	}
}
?>