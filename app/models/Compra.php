<?php
namespace App\Models;
use Core\DB;
class Compra {
    public static function all(): array {
        $st = DB::conn()->query("SELECT * FROM compras ORDER BY id DESC");
        return $st->fetchAll();
    }
    public static function find(int $id): ?array {
        $st = DB::conn()->prepare("SELECT * FROM compras WHERE id=:id");
        $st->execute([':id'=>$id]); $r=$st->fetch(); return $r?:null;
    }
    public static function create(array $d): int {
        $st = DB::conn()->prepare("INSERT INTO compras (proveedor, fecha, total) VALUES (:prov, :fecha, :total)");
        $st->execute([':prov'=>$d['proveedor'], ':fecha'=>$d['fecha'], ':total'=>$d['total']]);
        return (int)DB::conn()->lastInsertId();
    }
    public static function update(int $id, array $d): bool {
        $st = DB::conn()->prepare("UPDATE compras SET proveedor=:prov, fecha=:fecha, total=:total WHERE id=:id");
        return $st->execute([':prov'=>$d['proveedor'], ':fecha'=>$d['fecha'], ':total'=>$d['total'], ':id'=>$id]);
    }
    public static function delete(int $id): bool {
        $st = DB::conn()->prepare("DELETE FROM compras WHERE id=:id");
        return $st->execute([':id'=>$id]);
    }
}