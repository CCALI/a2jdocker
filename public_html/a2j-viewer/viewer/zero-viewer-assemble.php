<?php
/***
	* Get data example for pre loading viewer answers
	* Ideally this would include some access control code
***/

$data = file_get_contents('/var/www/private/data.xml');

echo $data;
 ?>
