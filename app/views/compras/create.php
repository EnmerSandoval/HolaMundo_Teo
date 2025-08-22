<?php $view='compras/create'; ?>
<div class="card"><h2>Nueva compra (1 item)</h2>
<form method="post" action="?c=compras&a=store" class="form-grid">
  <label>Proveedor<input name="proveedor" required></label>
  <label>Fecha<input type="date" name="fecha" required></label>
  <fieldset class="card">
    <legend>Detalle</legend>
    <label>Producto
      <select name="producto_id" required>
        <option value="">-- seleccione --</option>
        <?php foreach($productos as $p): ?><option value="<?= (int)$p['id'] ?>"><?= h($p['nombre']) ?></option><?php endforeach; ?>
      </select>
    </label>
    <label>Cantidad<input type="number" name="cantidad" data-compra-cantidad required></label>
    <label>Precio unitario<input type="number" step="0.01" name="precio_unitario" data-compra-precio required></label>
    <label>Subtotal<input type="number" step="0.01" name="subtotal" data-compra-subtotal readonly></label>
  </fieldset>
  <label>Total<input type="number" step="0.01" name="total" data-compra-total readonly></label>
  <button type="submit">Guardar</button>
</form></div>
