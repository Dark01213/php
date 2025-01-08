<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\TaskController;
use App\Controllers\ErrorController;

// Récupérez la page à afficher via une requête GET
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home': // Liste des tâches
        $controller = new TaskController();
        $controller->list();
        break;

    case 'create': // Formulaire de création d'une tâche
        $controller = new TaskController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store(); // Enregistre une nouvelle tâche
        } else {
            $controller->create(); // Affiche le formulaire de création
        }
        break;

    case 'delete': // Suppression d'une tâche
        if (isset($_GET['id'])) {
            $controller = new TaskController();
            $controller->delete($_GET['id']);
        } else {
            $errorController = new ErrorController();
            $errorController->notFound();
        }
        break;

    default: // Erreur 404
        $errorController = new ErrorController();
        $errorController->notFound();
        break;
}
