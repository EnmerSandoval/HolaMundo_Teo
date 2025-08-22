<?php $view='ventas/create'; ?>
<div class="card"><h2>Nueva venta</h2>
<form method="post" action="?c=ventas&a=store" class="form-grid">
  <label>Producto
    <select name="producto_id" required>
      <option value="">-- seleccione --</option>
      <?php foreach($productos as $p): ?><option value="<?= (int)$p['id'] ?>" data-precio="<?= h($p['precio']) ?>"><?= h($p['nombre']) ?> (Q <?= number_format((float)$p['precio'],2) ?>)</option><?php endforeach; ?>
    </select>
  </label>
  <label>Cantidad<input type="number" name="cantidad" data-venta-cantidad required></label>
  <label>Precio (ref.)<input type="number" step="0.01" name="precio_ref" data-venta-precio required oninput="/*solo visual*/"></label>
  <label>Total<input type="number" step="0.01" name="total_view" data-venta-total readonly></label>
  <label>Forma de pago
    <select name="forma_pago" required>
      <option value="efectivo">Efectivo</option>
      <option value="transferencia">Transferencia</option>
    </select>
  </label>
  <label>Referencia transferencia<input name="referencia_transferencia"></label>
  <button type="submit">Guardar</button>
</form>
<script>
// Rellena precio_ref según producto seleccionado
document.addEventListener('change', (e)=>{
  if(e.target.name==='producto_id'){
    const opt=e.target.selectedOptions[0];
    const precio=opt?opt.getAttribute('data-precio'):0;
    const inPrecio=document.querySelector('[data-venta-precio]');
    if(inPrecio){ inPrecio.value = precio || 0; inPrecio.dispatchEvent(new Event('input')); }
  }
});
</script>
</div>
