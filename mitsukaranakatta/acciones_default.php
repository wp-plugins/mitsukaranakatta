<?php

?>
<h3>Introduccion a mitsukaranakatta</h3>
<p>mitsukaranakatta es un generador de errores 404. En pocas palabras, cuando el usuario carge un archivo inexistente en el servidor, podras lanzar aleatoriamente mensajes personalizados con un titulo, un mensaje y una imagen.</p>
<h3>Iniciando con mitsukaranakatta</h3>
<p><strong>Opcion Agregar</strong>: Para iniciar debes alimentar la tabla de errores 404, para eso solo debes dar click en "agregar", que se encuentra en el pequeño menu que esta arriba de este mensaje. Podras agregar tantos mensajes de error 404 como necesites.</p>
<p><strong>Opcion Editar</strong>:Si deseas cambiar el titulo, mensaje o imagen de algun error 404 solo debes dar click en la opcion Editar del menu que esta arriba de este mensaje. De igual manera si deseas eliminar alguno. Una vez que accedas a esta opcion se desplegara una tabla con todos los errores y la opcion editar y eliminar a un lado de ellos.</p>
<h3>Como mostrar los errores</h3>
<p>Ahora que ya tienes unos cuantos errores personalizados en tu tabla (preferentemente como minimo de 3 a 4) debes mostrarlos. La mayoria de los temas para wordpress soportan la deteccion del error 404 por lo tanto debes buscar el archivo php en la carpeta del tema de tu blog, generalmente el archivo se llama 404.php. Una vez ahi comenta las lineas que muestran el titulo y el mensaje de error, regularmente comienzan con "&lt;?php _e(". Una vez comentadas estas lineas debes agregar estas lineas:</p>
<p> &lt;?php $mitsukaranakatta= new mitsukaranakatta();?&gt;<br />
&lt;h2&gt;&lt;?php $mitsukaranakatta-&gt;titulo(); ?&gt;&lt;/h2&gt;<br />
&lt;p&gt;&lt;?php $mitsukaranakatta-&gt;mensaje(); ?&gt;&lt;/p&gt;<br />
&lt;img src=&quot;&lt;?php $mitsukaranakatta-&gt;url_imagen(); ?&gt;&quot; /&gt;</p>
<p>La primer linea siempre es necesario que este antes que las demas para que puedas llamar la funcion que muestra el titulo, mensaje, url imagen. Como notaras el plug es en cierta manera flexible pues puedes aplicarle el estilo que desees.
</p>

