<?php $view='planes/edit'; ?>
<div class="card"><h2>Editar plan #<?= (int)$plan['id'] ?></h2>
<form method="post" action="?c=planes&a=update" class="form-grid">
  <input type="hidden" name="id" value="<?= (int)$plan['id'] ?>">
  <label>Nombre<input name="nombre" value="<?= h($plan['nombre']) ?>" required></label>
  <label>Precio<input name="precio" type="number" step="0.01" value="<?= h($plan['precio']) ?>" required></label>
  <button type="submit">Actualizar</button>
</form></div>
