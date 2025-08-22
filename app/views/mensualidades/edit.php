<?php $view='mensualidades/edit'; ?>
<div class="card"><h2>Editar mensualidad #<?= (int)$mensualidad['id'] ?></h2>
<form method="post" action="?c=mensualidades&a=update" class="form-grid">
  <input type="hidden" name="id" value="<?= (int)$mensualidad['id'] ?>">
  <label>Cliente
    <select name="cliente_id" required>
      <?php foreach($clientes as $c): ?><option value="<?= (int)$c['id'] ?>" <?= $c['id']==$mensualidad['cliente_id']?'selected':'' ?>><?= h($c['nombre']) ?></option><?php endforeach; ?>
    </select>
  </label>
  <label>Fecha pago<input type="date" name="fecha_pago" value="<?= h($mensualidad['fecha_pago']) ?>" required></label>
  <label>Forma de pago
    <select name="forma_pago" required>
      <option value="efectivo" <?= $mensualidad['forma_pago']=='efectivo'?'selected':'' ?>>Efectivo</option>
      <option value="transferencia" <?= $mensualidad['forma_pago']=='transferencia'?'selected':'' ?>>Transferencia</option>
    </select>
  </label>
  <label>Monto<input type="number" step="0.01" name="monto" value="<?= h($mensualidad['monto']) ?>" required></label>
  <label>Referencia transferencia<input name="referencia_transferencia" value="<?= h($mensualidad['referencia_transferencia'] ?? '') ?>"></label>
  <button type="submit">Actualizar</button>
</form></div>
