<?php $view='planes/index'; ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Planes</h2>
    <a class="btn primary" href="?c=planes&a=create">Nuevo</a>
  </div>
  <table class="table">
    <thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th></th></tr></thead>
    <tbody>
      <?php foreach($planes as $p): ?>
      <tr>
        <td><?= (int)$p['id'] ?></td>
        <td><?= h($p['nombre']) ?></td>
        <td>Q <?= number_format((float)$p['precio'],2) ?></td>
        <td class="actions">
          <a href="?c=planes&a=edit&id=<?= (int)$p['id'] ?>">Editar</a>
          <a href="?c=planes&a=destroy&id=<?= (int)$p['id'] ?>" onclick="return confirm('¿Eliminar plan?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
