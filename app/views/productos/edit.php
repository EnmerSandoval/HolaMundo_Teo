<?php $view='productos/edit'; ?>
<div class="card"><h2>Editar producto #<?= (int)$producto['id'] ?></h2>
<form method="post" action="?c=productos&a=update" class="form-grid">
  <input type="hidden" name="id" value="<?= (int)$producto['id'] ?>">
  <label>Nombre<input name="nombre" value="<?= h($producto['nombre']) ?>" required></label>
  <label>Precio compra<input type="number" step="0.01" name="precio_compra" value="<?= h($producto['precio_compra']) ?>" required></label>
  <label>Precio venta<input type="number" step="0.01" name="precio" value="<?= h($producto['precio']) ?>" required></label>
  <label>Stock<input type="number" name="stock" value="<?= h($producto['stock']) ?>" required></label>
  <button type="submit">Actualizar</button>
</form></div>
