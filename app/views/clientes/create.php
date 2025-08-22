<?php $view='clientes/create'; ?>
<div class="card"><h2>Nuevo cliente</h2>
<form method="post" action="?c=clientes&a=store" class="form-grid">
  <label>Nombre<input name="nombre" required></label>
  <label>Teléfono<input name="telefono"></label>
  <button type="submit">Guardar</button>
</form></div>
