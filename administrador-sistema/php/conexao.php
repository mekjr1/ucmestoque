<?php

define('Host', 'localhost');
define('User', 'root');
define('Password', '');
define('DBName', 'ucmestoque');

 $conn= new PDO('mysql:host=' . Host . ';dbname=' . DBName . ';', User, Password);
    
   


