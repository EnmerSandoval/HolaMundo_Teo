<?php
// app/core/Router.php
namespace Core;
class Router {
    public function dispatch(string $controller, string $action): void {
        $class = '\\App\\Controllers\\' . ucfirst(strtolower($controller)) . 'Controller';
        if (!class_exists($class)) { http_response_code(404); echo "Controller $class not found"; return; }
        $obj = new $class();
        if (!method_exists($obj, $action)) { http_response_code(404); echo "Action $action not found"; return; }
        $obj->$action();
    }
}
