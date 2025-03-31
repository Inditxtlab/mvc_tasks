<?php

class DatabaseConnection{

public?\PDO $database =null; 
public function getConnection(){


if ($this->database == NULL){
    $host= 'localhost'; 
    $dbname="mvc-tasks"; 
    $username= "root";
    $password= ""; 
    $charset= "utf8mb4"; 


$dsn= "mysql:host=$host; dbname=$dbname;charset=$charset"; 

$options=[
    PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
];
try {
    $this->database=NEW PDO($dsn, $username, $password, $options); 
} catch (PDOException $e) {
    die('Erreur de conexion à la bassee de donnees : ' . $e->getMessage()); 
    //throw $th;
}
}
return $this->database; 
}
}

?>