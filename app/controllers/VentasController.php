<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Venta;
use App\Models\Producto;
class VentasController extends Controller {
    public function index(): void { $this->view('ventas/index',['ventas'=>Venta::all(),'view'=>'ventas/index']); }
    public function create(): void { $this->view('ventas/create',['productos'=>Producto::all(),'view'=>'ventas/create']); }
    public function store(): void { if (method()!=='POST') redirect('c=ventas&a=index'); $id=Venta::create($_POST); redirect('c=ventas&a=edit&id='.$id); }
    public function edit(): void { $id=(int)($_GET['id']??0); $v=Venta::find($id); if(!$v){http_response_code(404);echo'Venta no encontrada';return;} $this->view('ventas/edit',['venta'=>$v,'productos'=>Producto::all(),'view'=>'ventas/edit']); }
    public function update(): void { if (method()!=='POST') redirect('c=ventas&a=index'); Venta::update((int)$_POST['id'], $_POST); redirect('c=ventas&a=index'); }
    public function destroy(): void { Venta::delete((int)($_GET['id']??0)); redirect('c=ventas&a=index'); }
}