<?php $view='compras/edit'; ?>
<div class="card"><h2>Editar compra #<?= (int)$compra['id'] ?></h2>
<form method="post" action="?c=compras&a=update" class="form-grid">
  <input type="hidden" name="id" value="<?= (int)$compra['id'] ?>">
  <label>Proveedor<input name="proveedor" value="<?= h($compra['proveedor']) ?>" required></label>
  <label>Fecha<input type="date" name="fecha" value="<?= h($compra['fecha']) ?>" required></label>
  <label>Total<input type="number" step="0.01" name="total" value="<?= h($compra['total']) ?>" required></label>
  <button type="submit">Actualizar</button>
</form>

<div class="card">
  <h3>Detalle</h3>
  <table class="table">
    <thead><tr><th>ID</th><th>Producto</th><th>Cant</th><th>P.U.</th><th>Subtotal</th></tr></thead>
    <tbody>
      <?php foreach($detalles as $d): ?>
      <tr>
        <td><?= (int)$d['id'] ?></td>
        <td><?= h($d['producto'] ?? '') ?></td>
        <td><?= (int)$d['cantidad'] ?></td>
        <td>Q <?= number_format((float)$d['precio_unitario'],2) ?></td>
        <td>Q <?= number_format((float)$d['subtotal'],2) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div class="card">
  <h3>Agregar detalle</h3>
  <form method="post" action="?c=compras&a=addDetalle" class="form-grid">
    <input type="hidden" name="compra_id" value="<?= (int)$compra['id'] ?>">
    <label>Producto
      <select name="producto_id" required>
        <?php foreach($productos as $p): ?><option value="<?= (int)$p['id'] ?>"><?= h($p['nombre']) ?></option><?php endforeach; ?>
      </select>
    </label>
    <label>Cantidad<input type="number" name="cantidad" required></label>
    <label>Precio unitario<input type="number" step="0.01" name="precio_unitario" required></label>
    <label>Subtotal<input type="number" step="0.01" name="subtotal" required></label>
    <button type="submit">Agregar</button>
  </form>
</div>
