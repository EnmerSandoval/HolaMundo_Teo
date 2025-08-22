<?php
namespace App\Models;
use Core\DB;
class Producto {
    public static function all(): array {
        $st = DB::conn()->query("SELECT * FROM productos ORDER BY id DESC");
        return $st->fetchAll();
    }
    public static function find(int $id): ?array {
        $st = DB::conn()->prepare("SELECT * FROM productos WHERE id=:id");
        $st->execute([':id'=>$id]); $r=$st->fetch(); return $r?:null;
    }
    public static function create(array $d): int {
        $st = DB::conn()->prepare("INSERT INTO productos (nombre, precio_compra, precio, stock) VALUES (:nombre, :pc, :p, :s)");
        $st->execute([':nombre'=>$d['nombre'], ':pc'=>$d['precio_compra'], ':p'=>$d['precio'], ':s'=>$d['stock']]);
        return (int)DB::conn()->lastInsertId();
    }
    public static function update(int $id, array $d): bool {
        $st = DB::conn()->prepare("UPDATE productos SET nombre=:nombre, precio_compra=:pc, precio=:p, stock=:s WHERE id=:id");
        return $st->execute([':nombre'=>$d['nombre'], ':pc'=>$d['precio_compra'], ':p'=>$d['precio'], ':s'=>$d['stock'], ':id'=>$id]);
    }
    public static function delete(int $id): bool {
        $st = DB::conn()->prepare("DELETE FROM productos WHERE id=:id");
        return $st->execute([':id'=>$id]);
    }
}