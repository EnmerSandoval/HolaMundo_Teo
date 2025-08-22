<?php
namespace App\Models;
use Core\DB;
class Mensualidad {
    public static function all(): array {
        $sql = "SELECT m.*, c.nombre AS cliente
                FROM mensualidades m
                LEFT JOIN clientes c ON c.id=m.cliente_id
                ORDER BY m.id DESC";
        return DB::conn()->query($sql)->fetchAll();
    }
    public static function find(int $id): ?array {
        $st = DB::conn()->prepare("SELECT * FROM mensualidades WHERE id=:id");
        $st->execute([':id'=>$id]); $r=$st->fetch(); return $r?:null;
    }
    public static function create(array $d): int {
        $st = DB::conn()->prepare("INSERT INTO mensualidades (cliente_id, fecha_pago, forma_pago, monto, referencia_transferencia) VALUES (:c,:fp,:fma,:m,:ref)");
        $st->execute([
            ':c'=>$d['cliente_id'], ':fp'=>$d['fecha_pago'],
            ':fma'=>$d['forma_pago'], ':m'=>$d['monto'],
            ':ref'=>$d['referencia_transferencia']??null
        ]);
        return (int)DB::conn()->lastInsertId();
    }
    public static function update(int $id, array $d): bool {
        $st = DB::conn()->prepare("UPDATE mensualidades SET cliente_id=:c, fecha_pago=:fp, forma_pago=:fma, monto=:m, referencia_transferencia=:ref WHERE id=:id");
        return $st->execute([
            ':c'=>$d['cliente_id'], ':fp'=>$d['fecha_pago'],
            ':fma'=>$d['forma_pago'], ':m'=>$d['monto'],
            ':ref'=>$d['referencia_transferencia']??null, ':id'=>$id
        ]);
    }
    public static function delete(int $id): bool {
        $st = DB::conn()->prepare("DELETE FROM mensualidades WHERE id=:id");
        return $st->execute([':id'=>$id]);
    }
}