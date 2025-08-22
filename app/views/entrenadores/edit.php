<?php $view='entrenadores/edit'; ?>
<div class="card"><h2>Editar entrenador #<?= (int)$entrenador['id'] ?></h2>
<form method="post" action="?c=entrenadores&a=update" class="form-grid">
  <input type="hidden" name="id" value="<?= (int)$entrenador['id'] ?>">
  <label>Nombre<input name="nombre" value="<?= h($entrenador['nombre']) ?>" required></label>
  <label>Teléfono<input name="telefono" value="<?= h($entrenador['telefono'] ?? '') ?>"></label>
  <button type="submit">Actualizar</button>
</form></div>
