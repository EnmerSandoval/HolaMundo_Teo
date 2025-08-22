<?php $view='clientes/edit'; ?>
<div class="card"><h2>Editar cliente #<?= (int)$cliente['id'] ?></h2>
<form method="post" action="?c=clientes&a=update" class="form-grid">
  <input type="hidden" name="id" value="<?= (int)$cliente['id'] ?>">
  <label>Nombre<input name="nombre" value="<?= h($cliente['nombre']) ?>" required></label>
  <label>Teléfono<input name="telefono" value="<?= h($cliente['telefono'] ?? '') ?>"></label>
  <button type="submit">Actualizar</button>
</form></div>
