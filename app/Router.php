<?php
namespace App;

class Router {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function dispatch($method, $uri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                if (is_callable($route['handler'])) {
                    return $route['handler']();
                } elseif (is_array($route['handler'])) {
                    $controller = new $route['handler'][0]();
                    return $controller->{$route['handler'][1]}();
                }
            }
        }

        http_response_code(404);
        (new \App\Controllers\ErrorController())->notFound();
    }
}
