<?php $view='asistencia/create'; ?>
<div class="card"><h2>Nueva asistencia</h2>
<form method="post" action="?c=asistencia&a=store" class="form-grid">
  <label>Cliente
    <select name="cliente_id" required>
      <option value="">-- seleccione --</option>
      <?php foreach($clientes as $c): ?><option value="<?= (int)$c['id'] ?>"><?= h($c['nombre']) ?></option><?php endforeach; ?>
    </select>
  </label>
  <label>Entrenador
    <select name="entrenador_id" required>
      <option value="">-- seleccione --</option>
      <?php foreach($entrenadores as $e): ?><option value="<?= (int)$e['id'] ?>"><?= h($e['nombre']) ?></option><?php endforeach; ?>
    </select>
  </label>
  <label>Fecha<input type="date" name="fecha" required></label>
  <label>Hora<input type="time" name="hora" required></label>
  <button type="submit">Guardar</button>
</form></div>
