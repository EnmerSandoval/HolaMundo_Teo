<?php $view='productos/index'; ?>
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Productos</h2>
    <a class="btn primary" href="?c=productos&a=create">Nuevo</a>
  </div>
  <table class="table">
    <thead><tr><th>ID</th><th>Nombre</th><th>Precio compra</th><th>Precio</th><th>Stock</th><th></th></tr></thead>
    <tbody>
      <?php foreach($productos as $p): ?>
      <tr>
        <td><?= (int)$p['id'] ?></td>
        <td><?= h($p['nombre']) ?></td>
        <td>Q <?= number_format((float)$p['precio_compra'],2) ?></td>
        <td>Q <?= number_format((float)$p['precio'],2) ?></td>
        <td><span class="badge"><?= (int)$p['stock'] ?></span></td>
        <td class="actions">
          <a href="?c=productos&a=edit&id=<?= (int)$p['id'] ?>">Editar</a>
          <a href="?c=productos&a=destroy&id=<?= (int)$p['id'] ?>" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
