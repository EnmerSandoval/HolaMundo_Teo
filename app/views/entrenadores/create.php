<?php $view='entrenadores/create'; ?>
<div class="card"><h2>Nuevo entrenador</h2>
<form method="post" action="?c=entrenadores&a=store" class="form-grid">
  <label>Nombre<input name="nombre" required></label>
  <label>Teléfono<input name="telefono"></label>
  <button type="submit">Guardar</button>
</form></div>
