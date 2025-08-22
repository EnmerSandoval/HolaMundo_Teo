<?php
namespace App\Models;
use Core\DB;
class Plan {
    public static function all(): array {
        $st = DB::conn()->query("SELECT * FROM planes ORDER BY id DESC");
        return $st->fetchAll();
    }
    public static function find(int $id): ?array {
        $st = DB::conn()->prepare("SELECT * FROM planes WHERE id=:id");
        $st->execute([':id'=>$id]); $r = $st->fetch(); return $r?:null;
    }
    public static function create(array $d): int {
        $st = DB::conn()->prepare("INSERT INTO planes (nombre, precio) VALUES (:nombre, :precio)");
        $st->execute([':nombre'=>$d['nombre'], ':precio'=>$d['precio']]);
        return (int)DB::conn()->lastInsertId();
    }
    public static function update(int $id, array $d): bool {
        $st = DB::conn()->prepare("UPDATE planes SET nombre=:nombre, precio=:precio WHERE id=:id");
        return $st->execute([':nombre'=>$d['nombre'], ':precio'=>$d['precio'], ':id'=>$id]);
    }
    public static function delete(int $id): bool {
        $st = DB::conn()->prepare("DELETE FROM planes WHERE id=:id");
        return $st->execute([':id'=>$id]);
    }
}