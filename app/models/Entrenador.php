<?php
namespace App\Models;
use Core\DB;
class Entrenador {
    public static function all(): array {
        $st = DB::conn()->query("SELECT * FROM entrenadores ORDER BY id DESC");
        return $st->fetchAll();
    }
    public static function find(int $id): ?array {
        $st = DB::conn()->prepare("SELECT * FROM entrenadores WHERE id=:id");
        $st->execute([':id'=>$id]); $r=$st->fetch(); return $r?:null;
    }
    public static function create(array $d): int {
        $st = DB::conn()->prepare("INSERT INTO entrenadores (nombre, telefono) VALUES (:nombre, :telefono)");
        $st->execute([':nombre'=>$d['nombre'], ':telefono'=>$d['telefono']??null]);
        return (int)DB::conn()->lastInsertId();
    }
    public static function update(int $id, array $d): bool {
        $st = DB::conn()->prepare("UPDATE entrenadores SET nombre=:nombre, telefono=:telefono WHERE id=:id");
        return $st->execute([':nombre'=>$d['nombre'], ':telefono'=>$d['telefono']??null, ':id'=>$id]);
    }
    public static function delete(int $id): bool {
        $st = DB::conn()->prepare("DELETE FROM entrenadores WHERE id=:id");
        return $st->execute([':id'=>$id]);
    }
}