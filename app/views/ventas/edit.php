<?php $view='ventas/edit'; ?>
<div class="card"><h2>Editar venta #<?= (int)$venta['id'] ?></h2>
<form method="post" action="?c=ventas&a=update" class="form-grid">
  <input type="hidden" name="id" value="<?= (int)$venta['id'] ?>">
  <label>Producto
    <select name="producto_id" required>
      <?php foreach($productos as $p): ?><option value="<?= (int)$p['id'] ?>" <?= $p['id']==$venta['producto_id']?'selected':'' ?>><?= h($p['nombre']) ?></option><?php endforeach; ?>
    </select>
  </label>
  <label>Cantidad<input type="number" name="cantidad" value="<?= h($venta['cantidad']) ?>" required></label>
  <label>Forma de pago
    <select name="forma_pago" required>
      <option value="efectivo" <?= $venta['forma_pago']=='efectivo'?'selected':'' ?>>Efectivo</option>
      <option value="transferencia" <?= $venta['forma_pago']=='transferencia'?'selected':'' ?>>Transferencia</option>
    </select>
  </label>
  <label>Referencia transferencia<input name="referencia_transferencia" value="<?= h($venta['referencia_transferencia'] ?? '') ?>"></label>
  <button type="submit">Actualizar</button>
</form></div>
