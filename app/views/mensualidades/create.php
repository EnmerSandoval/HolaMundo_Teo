<?php $view='mensualidades/create'; ?>
<div class="card"><h2>Nueva mensualidad</h2>
<form method="post" action="?c=mensualidades&a=store" class="form-grid">
  <label>Cliente
    <select name="cliente_id" required>
      <option value="">-- seleccione --</option>
      <?php foreach($clientes as $c): ?><option value="<?= (int)$c['id'] ?>"><?= h($c['nombre']) ?></option><?php endforeach; ?>
    </select>
  </label>
  <label>Fecha pago<input type="date" name="fecha_pago" required></label>
  <label>Forma de pago
    <select name="forma_pago" required>
      <option value="efectivo">Efectivo</option>
      <option value="transferencia">Transferencia</option>
    </select>
  </label>
  <label>Monto<input type="number" step="0.01" name="monto" required></label>
  <label>Referencia transferencia<input name="referencia_transferencia"></label>
  <button type="submit">Guardar</button>
</form></div>
