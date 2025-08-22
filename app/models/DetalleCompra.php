<?php
namespace App\Models;
use Core\DB;
class DetalleCompra {
    public static function allByCompra(int $compraId): array {
        $sql = "SELECT d.*, p.nombre AS producto
                FROM detalle_compras d LEFT JOIN productos p ON p.id=d.producto_id
                WHERE d.compra_id=:c ORDER BY d.id DESC";
        $st = DB::conn()->prepare($sql); $st->execute([':c'=>$compraId]); return $st->fetchAll();
    }
    public static function create(array $d): int {
        $st = DB::conn()->prepare("INSERT INTO detalle_compras (compra_id, producto_id, cantidad, precio_unitario, subtotal) VALUES (:c,:p,:cant,:pu,:sub)");
        $st->execute([':c'=>$d['compra_id'], ':p'=>$d['producto_id'], ':cant'=>$d['cantidad'], ':pu'=>$d['precio_unitario'], ':sub'=>$d['subtotal']]);
        return (int)DB::conn()->lastInsertId();
    }
    public static function delete(int $id): bool {
        $st = DB::conn()->prepare("DELETE FROM detalle_compras WHERE id=:id");
        return $st->execute([':id'=>$id]);
    }
}