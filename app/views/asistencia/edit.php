<?php $view='asistencia/edit'; ?>
<div class="card"><h2>Editar asistencia #<?= (int)$asistencia['id'] ?></h2>
<form method="post" action="?c=asistencia&a=update" class="form-grid">
  <input type="hidden" name="id" value="<?= (int)$asistencia['id'] ?>">
  <label>Cliente
    <select name="cliente_id" required>
      <?php foreach($clientes as $c): ?><option value="<?= (int)$c['id'] ?>" <?= $c['id']==$asistencia['cliente_id']?'selected':'' ?>><?= h($c['nombre']) ?></option><?php endforeach; ?>
    </select>
  </label>
  <label>Entrenador
    <select name="entrenador_id" required>
      <?php foreach($entrenadores as $e): ?><option value="<?= (int)$e['id'] ?>" <?= $e['id']==$asistencia['entrenador_id']?'selected':'' ?>><?= h($e['nombre']) ?></option><?php endforeach; ?>
    </select>
  </label>
  <label>Fecha<input type="date" name="fecha" value="<?= h($asistencia['fecha']) ?>" required></label>
  <label>Hora<input type="time" name="hora" value="<?= h($asistencia['hora']) ?>" required></label>
  <button type="submit">Actualizar</button>
</form></div>
