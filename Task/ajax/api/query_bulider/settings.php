<?php
//This is Setting file

################ All Constants ##########################
define('HOST','localhost:3306');
define('USER','root');
define('PASSWORD','');
define('DBNAME','app-22');
define('BASE_URL','http://localhost:7000/');
################ All Constants ##########################

return [
	
	'db:config'=>[
		
		'host'=>'localhost:3306',
		'user'=>'root',
		'password'=>'',
		'dbname'=>'app-22',
	],
    'connection:debug' => false,                                      
];