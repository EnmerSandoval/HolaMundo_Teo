<?php
namespace App\Models;
use Core\DB;
class Venta {
    public static function all(): array {
        $sql = "SELECT v.*, p.nombre AS producto FROM ventas v LEFT JOIN productos p ON p.id=v.producto_id ORDER BY v.id DESC";
        return DB::conn()->query($sql)->fetchAll();
    }
    public static function find(int $id): ?array {
        $st = DB::conn()->prepare("SELECT * FROM ventas WHERE id=:id");
        $st->execute([':id'=>$id]); $r=$st->fetch(); return $r?:null;
    }
    public static function create(array $d): int {
        // total = cantidad * precio (calculado en UI, pero reforzado aquí con precio actual)
        $p = DB::conn()->prepare("SELECT precio FROM productos WHERE id=:id"); $p->execute([':id'=>$d['producto_id']]);
        $precio = (float)($p->fetch()['precio'] ?? 0);
        $cantidad = (int)$d['cantidad'];
        $total = $precio * $cantidad;
        $st = DB::conn()->prepare("INSERT INTO ventas (producto_id, cantidad, total, forma_pago, referencia_transferencia) VALUES (:prod,:cant,:tot,:fp,:ref)");
        $st->execute([':prod'=>$d['producto_id'], ':cant'=>$cantidad, ':tot'=>$total, ':fp'=>$d['forma_pago'], ':ref'=>$d['referencia_transferencia']??null]);
        return (int)DB::conn()->lastInsertId();
    }
    public static function update(int $id, array $d): bool {
        $p = DB::conn()->prepare("SELECT precio FROM productos WHERE id=:id"); $p->execute([':id'=>$d['producto_id']]);
        $precio = (float)($p->fetch()['precio'] ?? 0);
        $cantidad = (int)$d['cantidad'];
        $total = $precio * $cantidad;
        $st = DB::conn()->prepare("UPDATE ventas SET producto_id=:prod, cantidad=:cant, total=:tot, forma_pago=:fp, referencia_transferencia=:ref WHERE id=:id");
        return $st->execute([':prod'=>$d['producto_id'], ':cant'=>$cantidad, ':tot'=>$total, ':fp'=>$d['forma_pago'], ':ref'=>$d['referencia_transferencia']??null, ':id'=>$id]);
    }
    public static function delete(int $id): bool {
        $st = DB::conn()->prepare("DELETE FROM ventas WHERE id=:id");
        return $st->execute([':id'=>$id]);
    }
}