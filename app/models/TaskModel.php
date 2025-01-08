<?php
namespace App\Models;

class TaskModel {
    public function getAllTasks() {
        return Database::read(); // Lit les tâches depuis le fichier JSON
    }

    public function addTask($title, $description) {
        $tasks = Database::read();
        $tasks[] = [
            'id' => count($tasks) + 1, // Génère un nouvel ID
            'title' => $title,
            'description' => $description,
        ];
        Database::write($tasks); // Écrit les tâches dans le fichier JSON
    }

    public function deleteTask($id) {
        $tasks = Database::read();
        $tasks = array_filter($tasks, function ($task) use ($id) {
            return $task['id'] != $id; // Supprime la tâche avec l'ID correspondant
        });
        Database::write(array_values($tasks)); // Réécrit les tâches dans le fichier JSON
    }
}
