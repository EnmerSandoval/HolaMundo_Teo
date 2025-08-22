<?php $view='productos/create'; ?>
<div class="card"><h2>Nuevo producto</h2>
<form method="post" action="?c=productos&a=store" class="form-grid">
  <label>Nombre<input name="nombre" required></label>
  <label>Precio compra<input type="number" step="0.01" name="precio_compra" required></label>
  <label>Precio venta<input type="number" step="0.01" name="precio" required></label>
  <label>Stock<input type="number" name="stock" required></label>
  <button type="submit">Guardar</button>
</form></div>
