<?php
// app/core/Controller.php
namespace Core;
abstract class Controller {
    protected function view(string $view, array $data = []): void {
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (!file_exists($viewFile)) { http_response_code(404); echo "View not found: $view"; return; }
        extract($data);
        include __DIR__ . '/../views/layouts/main.php';
    }
}
