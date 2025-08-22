// public/assets/js/app.js
document.addEventListener('DOMContentLoaded', () => {
  console.log('Gym MVC listo');
  // Calcular total de ventas y compras en los formularios (si existen)
  const ventaQty = document.querySelector('[data-venta-cantidad]');
  const ventaPrecio = document.querySelector('[data-venta-precio]');
  const ventaTotal = document.querySelector('[data-venta-total]');
  if (ventaQty && ventaPrecio && ventaTotal) {
    const recalc = () => ventaTotal.value = (parseFloat(ventaQty.value||0) * parseFloat(ventaPrecio.value||0)).toFixed(2);
    ventaQty.addEventListener('input', recalc); ventaPrecio.addEventListener('input', recalc); recalc();
  }
  const compQty = document.querySelector('[data-compra-cantidad]');
  const compPrecio = document.querySelector('[data-compra-precio]');
  const compSubtotal = document.querySelector('[data-compra-subtotal]');
  const compTotal = document.querySelector('[data-compra-total]');
  if (compQty && compPrecio && compSubtotal && compTotal) {
    const recalcC = () => {
      const sub = parseFloat(compQty.value||0)*parseFloat(compPrecio.value||0);
      compSubtotal.value = sub.toFixed(2);
      compTotal.value = sub.toFixed(2);
    };
    compQty.addEventListener('input', recalcC); compPrecio.addEventListener('input', recalcC); recalcC();
  }
});