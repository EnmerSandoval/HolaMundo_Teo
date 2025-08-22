<?php
// app/core/helpers.php
function h(?string $v): string { return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }
function redirect(string $query): void { header("Location: ?$query"); exit; }
function method(): string { return $_SERVER['REQUEST_METHOD'] ?? 'GET'; }
