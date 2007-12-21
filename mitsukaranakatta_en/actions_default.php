<?php

?>
<h3>Introduction to mitsukaranakatta </h3>
<p>mitsukaranakatta is a generator of errors 404. Briefly, when the user carge a nonexistent file in the servant, podras to send randomly customized messages with I title, a message and an image.</p>
<h3>Initiating with mitsukaranakatta</h3>
<p><strong>Option To add</strong>: In order to initiate you must feed the table on errors 404, for that single one you must give click in “adding”, that is in the small menu that this above of this message. You will be able to add so many messages of error 404 as you need.</p>
<p><strong>Option To publish</strong>:</p>
<h3>Like showing the errors</h3>
<p>Now that already you have a few customized errors in your table (as preferredly minimum from 3 to 4) you must show them. Most of the subjects for wordpress they support the detection of error 404 therefore you must look for the file php in the folder of the subject of your blog, the file is called 404.php generally. Once it comments the lines there that show I title and the error message, regularly begin with "&lt;?php _e(". Once commented these lines you must add these lines:</p>
<p> &lt;?php $mitsukaranakatta= new mitsukaranakatta();?&gt;<br />
&lt;h2&gt;&lt;?php $mitsukaranakatta-&gt;title(); ?&gt;&lt;/h2&gt;<br />
&lt;p&gt;&lt;?php $mitsukaranakatta-&gt;message(); ?&gt;&lt;/p&gt;<br />
&lt;img src=&quot;&lt;?php $mitsukaranakatta-&gt;url_image(); ?&gt;&quot; /&gt;</p>
<p>Forward edge always is necessary that this before the others so that you can call the function that shows I title, message, URL image. As you noticed plug is in certain flexible way because you can apply the style to him that you wish.
</p>

