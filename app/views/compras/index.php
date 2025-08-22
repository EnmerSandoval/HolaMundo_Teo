<?php $view='compras/index'; ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Compras</h2>
    <a class="btn primary" href="?c=compras&a=create">Nueva</a>
  </div>
  <table class="table">
    <thead><tr><th>ID</th><th>Proveedor</th><th>Fecha</th><th>Total</th><th></th></tr></thead>
    <tbody>
      <?php foreach($compras as $c): ?>
      <tr>
        <td><?= (int)$c['id'] ?></td>
        <td><?= h($c['proveedor']) ?></td>
        <td><?= h($c['fecha']) ?></td>
        <td>Q <?= number_format((float)$c['total'],2) ?></td>
        <td class="actions">
          <a href="?c=compras&a=edit&id=<?= (int)$c['id'] ?>">Editar</a>
          <a href="?c=compras&a=destroy&id=<?= (int)$c['id'] ?>" onclick="return confirm('¿Eliminar compra?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
