<?php
$dsn = 'pgsql:host=localhost;dbname=restman';
$username = 'neutron';
$password = 'lolfool';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
	echo $e;
}
