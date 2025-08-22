<?php
namespace App\Models;
use Core\DB;
class Asistencia {
    public static function all(): array {
        $sql = "SELECT a.*, c.nombre AS cliente, e.nombre AS entrenador
                FROM asistencia a
                LEFT JOIN clientes c ON c.id=a.cliente_id
                LEFT JOIN entrenadores e ON e.id=a.entrenador_id
                ORDER BY a.id DESC";
        return DB::conn()->query($sql)->fetchAll();
    }
    public static function find(int $id): ?array {
        $st = DB::conn()->prepare("SELECT * FROM asistencia WHERE id=:id");
        $st->execute([':id'=>$id]); $r=$st->fetch(); return $r?:null;
    }
    public static function create(array $d): int {
        $st = DB::conn()->prepare("INSERT INTO asistencia (cliente_id, entrenador_id, fecha, hora) VALUES (:c,:e,:f,:h)");
        $st->execute([':c'=>$d['cliente_id'], ':e'=>$d['entrenador_id'], ':f'=>$d['fecha'], ':h'=>$d['hora']]);
        return (int)DB::conn()->lastInsertId();
    }
    public static function update(int $id, array $d): bool {
        $st = DB::conn()->prepare("UPDATE asistencia SET cliente_id=:c, entrenador_id=:e, fecha=:f, hora=:h WHERE id=:id");
        return $st->execute([':c'=>$d['cliente_id'], ':e'=>$d['entrenador_id'], ':f'=>$d['fecha'], ':h'=>$d['hora'], ':id'=>$id]);
    }
    public static function delete(int $id): bool {
        $st = DB::conn()->prepare("DELETE FROM asistencia WHERE id=:id");
        return $st->execute([':id'=>$id]);
    }
}