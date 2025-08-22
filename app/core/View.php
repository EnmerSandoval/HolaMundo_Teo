<?php
// app/core/View.php
namespace Core;
class View {
    public static function partial(string $view, array $data = []): void {
        $path = __DIR__ . '/../views/' . $view . '.php';
        extract($data);
        include $path;
    }
}
