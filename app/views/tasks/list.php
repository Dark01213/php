<!DOCTYPE html>
<html lang="en">
<head>
    <title>Liste des tâches</title>
</head>
<body>
    <h1>Liste des tâches</h1>
    <a href="?page=create">Créer une nouvelle tâche</a>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?= htmlspecialchars($task['title']); ?></strong>
                <p><?= htmlspecialchars($task['description']); ?></p>
                <a href="?page=delete&id=<?= $task['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
