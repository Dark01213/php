<?php
namespace App\Controllers;

use App\Models\TaskModel;

class TaskController {
    public function list() {
        $taskModel = new TaskModel();
        $tasks = $taskModel->getAllTasks(); // Récupérer toutes les tâches
        require __DIR__ . '/../views/tasks/list.php';
    }

    public function create() {
        require __DIR__ . '/../views/tasks/create.php'; // Afficher le formulaire de création
    }

    public function store() {
        $taskModel = new TaskModel();
        if (isset($_POST['title']) && isset($_POST['description'])) {
            $taskModel->addTask($_POST['title'], $_POST['description']);
        }
        header('Location: ?page=home'); // Redirection vers la page d'accueil
        exit();
    }

    public function delete($id) {
        $taskModel = new TaskModel();
        $taskModel->deleteTask($id); // Supprimer une tâche par ID
        header('Location: ?page=home'); // Redirection vers la page d'accueil
        exit();
    }
}
