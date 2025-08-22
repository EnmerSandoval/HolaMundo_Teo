<?php $view='planes/create'; ?>
<div class="card"><h2>Nuevo plan</h2>
<form method="post" action="?c=planes&a=store" class="form-grid">
  <label>Nombre<input name="nombre" required></label>
  <label>Precio<input name="precio" type="number" step="0.01" required></label>
  <button type="submit">Guardar</button>
</form></div>
