<?php

$host = (string) 'localhost';
$login = (string) 'p-331522_oqimyn';
$password = (string) 'Q42a94au!';
$dbName = (string) 'p-331522_oqimyn';

/**
 * Connect to database
 */
$db = mysqli_connect($host, $login, $password, $dbName);

if(!$db) die('Error db');