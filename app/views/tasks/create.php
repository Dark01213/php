<!DOCTYPE html>
<html lang="en">
<head>
    <title>Créer une tâche</title>
</head>
<body>
    <h1>Créer une nouvelle tâche</h1>
    <form method="POST" action="?page=create">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit">Créer</button>
    </form>
    <a href="?page=home">Retour à la liste des tâches</a>
</body>
</html>
