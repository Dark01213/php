<?php
namespace App\Models;

class Database {
    private static $file = __DIR__ . '/../../data/tasks.json';

    public static function read() {
        if (!file_exists(self::$file)) {
            return []; // Si le fichier n'existe pas, retournez un tableau vide
        }
        $data = file_get_contents(self::$file);
        return json_decode($data, true) ?? []; // Retourne un tableau vide si le JSON est invalide
    }

    public static function write($data) {
        file_put_contents(self::$file, json_encode($data, JSON_PRETTY_PRINT));
    }
}
