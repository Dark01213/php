<?php
namespace App\Controllers;

class ErrorController {
    public function notFound() {
        http_response_code(404); // Code HTTP 404
        require __DIR__ . '/../views/error.php'; // Charger la vue d'erreur
    }
}
