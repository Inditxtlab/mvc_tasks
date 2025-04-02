<?php

// Ce code est un contrôleur frontal en PHP qui gère les actions d'une application via une logique de routage. Il utilise un contrôleur TaskController pour exécuter différentes actions en fonction du paramètre action passé dans l'URL.

//Recuperation du fichier un fois et avec la constante magique qui retourne la route absolute du fichier nomme.

require_once __DIR__ . '/controllers/TaskController.php';

$taskController = new TaskController(); //instansacion d'un nouveau TaskController (utilisee pour execute les action)

$action = $_GET['action'] ?? 'index'; // Si $_GET['action'] est null ou vide, alors on renvoi index. Sinon on renvoi $_GET['action']
$id = $_GET['id'] ?? null; // le meme, envoi la valeur s'il existe, sinon envoi la valeur de droite (null)

//En fonction de la valeur d'action on execute une methode especifique de TaskCotroller
switch ($action) {
    case 'view':
        $taskController->show($id);
        break;
    case 'create':
        $taskController->create();
        break;
    case 'index':
        $taskController->home();
        break;
    case 'store':
        $taskController->store();
        break;
    case 'edit':
        $taskController->edit($id);
        break;
    case 'update':
        $taskController->update();
        break;
    case 'delete':
        $taskController->delete($id);
        break;
    default:
        $taskController->forbidden();
        break;
}