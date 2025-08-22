<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Producto;
class ProductosController extends Controller {
    public function index(): void { $this->view('productos/index', ['productos'=>Producto::all(),'view'=>'productos/index']); }
    public function create(): void { $this->view('productos/create', ['view'=>'productos/create']); }
    public function store(): void { if (method()!=='POST') redirect('c=productos&a=index'); $id=Producto::create($_POST); redirect('c=productos&a=edit&id='.$id); }
    public function edit(): void { $id=(int)($_GET['id']??0); $p=Producto::find($id); if(!$p){http_response_code(404);echo'Producto no encontrado';return;} $this->view('productos/edit',['producto'=>$p,'view'=>'productos/edit']); }
    public function update(): void { if (method()!=='POST') redirect('c=productos&a=index'); Producto::update((int)$_POST['id'], $_POST); redirect('c=productos&a=index'); }
    public function destroy(): void { Producto::delete((int)($_GET['id']??0)); redirect('c=productos&a=index'); }
}