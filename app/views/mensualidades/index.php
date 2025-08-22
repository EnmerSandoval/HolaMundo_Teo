<?php $view='mensualidades/index'; ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Mensualidades</h2>
    <a class="btn primary" href="?c=mensualidades&a=create">Nueva</a>
  </div>
  <table class="table">
    <thead><tr><th>ID</th><th>Cliente</th><th>Fecha pago</th><th>Forma pago</th><th>Monto</th><th>Referencia</th><th></th></tr></thead>
    <tbody>
      <?php foreach($mensualidades as $m): ?>
      <tr>
        <td><?= (int)$m['id'] ?></td>
        <td><?= h($m['cliente'] ?? '') ?></td>
        <td><?= h($m['fecha_pago']) ?></td>
        <td><?= h($m['forma_pago']) ?></td>
        <td>Q <?= number_format((float)$m['monto'],2) ?></td>
        <td><?= h($m['referencia_transferencia'] ?? '') ?></td>
        <td class="actions">
          <a href="?c=mensualidades&a=edit&id=<?= (int)$m['id'] ?>">Editar</a>
          <a href="?c=mensualidades&a=destroy&id=<?= (int)$m['id'] ?>" onclick="return confirm('¿Eliminar mensualidad?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
