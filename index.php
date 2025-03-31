<?php
require_once __DIR__ . '/lib/database.php'; 

$db= new DatabaseConnection(); 

$tasks = $db->getConnection()->query
('SELECT *FROM tasks')->fetchAll(); 

    var_dump($tasks); 
