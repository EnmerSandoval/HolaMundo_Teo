<?php $view='entrenadores/index'; ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Entrenadores</h2>
    <a class="btn primary" href="?c=entrenadores&a=create">Nuevo</a>
  </div>
  <table class="table">
    <thead><tr><th>ID</th><th>Nombre</th><th>Teléfono</th><th></th></tr></thead>
    <tbody>
      <?php foreach($entrenadores as $e): ?>
      <tr>
        <td><?= (int)$e['id'] ?></td>
        <td><?= h($e['nombre']) ?></td>
        <td><?= h($e['telefono'] ?? '') ?></td>
        <td class="actions">
          <a href="?c=entrenadores&a=edit&id=<?= (int)$e['id'] ?>">Editar</a>
          <a href="?c=entrenadores&a=destroy&id=<?= (int)$e['id'] ?>" onclick="return confirm('¿Eliminar entrenador?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
