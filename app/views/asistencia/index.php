<?php $view='asistencia/index'; ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Asistencia</h2>
    <a class="btn primary" href="?c=asistencia&a=create">Nueva</a>
  </div>
  <table class="table">
    <thead><tr><th>ID</th><th>Cliente</th><th>Entrenador</th><th>Fecha</th><th>Hora</th><th></th></tr></thead>
    <tbody>
      <?php foreach($asistencias as $a): ?>
      <tr>
        <td><?= (int)$a['id'] ?></td>
        <td><?= h($a['cliente'] ?? '') ?></td>
        <td><?= h($a['entrenador'] ?? '') ?></td>
        <td><?= h($a['fecha']) ?></td>
        <td><?= h($a['hora']) ?></td>
        <td class="actions">
          <a href="?c=asistencia&a=edit&id=<?= (int)$a['id'] ?>">Editar</a>
          <a href="?c=asistencia&a=destroy&id=<?= (int)$a['id'] ?>" onclick="return confirm('¿Eliminar asistencia?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
