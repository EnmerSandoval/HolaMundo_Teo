<?php $view='clientes/index'; ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Clientes</h2>
    <a class="btn primary" href="?c=clientes&a=create">Nuevo</a>
  </div>
  <table class="table">
    <thead><tr><th>ID</th><th>Nombre</th><th>Teléfono</th><th></th></tr></thead>
    <tbody>
      <?php foreach($clientes as $c): ?>
      <tr>
        <td><?= (int)$c['id'] ?></td>
        <td><?= h($c['nombre']) ?></td>
        <td><?= h($c['telefono'] ?? '') ?></td>
        <td class="actions">
          <a href="?c=clientes&a=edit&id=<?= (int)$c['id'] ?>">Editar</a>
          <a href="?c=clientes&a=destroy&id=<?= (int)$c['id'] ?>" onclick="return confirm('¿Eliminar cliente?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
