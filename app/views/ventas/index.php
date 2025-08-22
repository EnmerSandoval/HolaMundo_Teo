<?php $view='ventas/index'; ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Ventas</h2>
    <a class="btn primary" href="?c=ventas&a=create">Nueva</a>
  </div>
  <table class="table">
    <thead><tr><th>ID</th><th>Producto</th><th>Cantidad</th><th>Total</th><th>Forma pago</th><th>Ref</th><th></th></tr></thead>
    <tbody>
      <?php foreach($ventas as $v): ?>
      <tr>
        <td><?= (int)$v['id'] ?></td>
        <td><?= h($v['producto'] ?? '') ?></td>
        <td><?= (int)$v['cantidad'] ?></td>
        <td>Q <?= number_format((float)$v['total'],2) ?></td>
        <td><?= h($v['forma_pago'] ?? '') ?></td>
        <td><?= h($v['referencia_transferencia'] ?? '') ?></td>
        <td class="actions">
          <a href="?c=ventas&a=edit&id=<?= (int)$v['id'] ?>">Editar</a>
          <a href="?c=ventas&a=destroy&id=<?= (int)$v['id'] ?>" onclick="return confirm('¿Eliminar venta?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
