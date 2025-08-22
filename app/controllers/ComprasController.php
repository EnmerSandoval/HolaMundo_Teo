<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Producto;
class ComprasController extends Controller {
    public function index(): void { $this->view('compras/index',['compras'=>Compra::all(),'view'=>'compras/index']); }
    public function create(): void { $this->view('compras/create',['productos'=>Producto::all(),'view'=>'compras/create']); }
    public function store(): void {
        if (method()!=='POST') redirect('c=compras&a=index');
        // Primero cabecera
        $compraId = Compra::create(['proveedor'=>$_POST['proveedor'],'fecha'=>$_POST['fecha'],'total'=>$_POST['total']]);
        // Luego detalle simple (una línea)
        DetalleCompra::create([
            'compra_id'=>$compraId,'producto_id'=>$_POST['producto_id'],
            'cantidad'=>$_POST['cantidad'],'precio_unitario'=>$_POST['precio_unitario'],'subtotal'=>$_POST['subtotal']
        ]);
        redirect('c=compras&a=edit&id='.$compraId);
    }
    public function edit(): void {
        $id=(int)($_GET['id']??0);
        $c=Compra::find($id);
        if(!$c){http_response_code(404);echo'Compra no encontrada';return;}
        $detalles = \App\Models\DetalleCompra::allByCompra($id);
        $this->view('compras/edit',['compra'=>$c,'detalles'=>$detalles,'productos'=>\App\Models\Producto::all(),'view'=>'compras/edit']);
    }
    public function update(): void {
        if (method()!=='POST') redirect('c=compras&a=index');
        Compra::update((int)$_POST['id'], $_POST); redirect('c=compras&a=index');
    }
    public function addDetalle(): void {
        if (method()!=='POST') redirect('c=compras&a=index');
        DetalleCompra::create($_POST); redirect('c=compras&a=edit&id='.(int)$_POST['compra_id']);
    }
    public function destroy(): void { Compra::delete((int)($_GET['id']??0)); redirect('c=compras&a=index'); }
}