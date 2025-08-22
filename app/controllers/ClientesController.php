<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Cliente;
class ClientesController extends Controller {
    public function index(): void { $this->view('clientes/index', ['clientes'=>Cliente::all(),'view'=>'clientes/index']); }
    public function create(): void { $this->view('clientes/create', ['view'=>'clientes/create']); }
    public function store(): void {
        if (method()!=='POST') redirect('c=clientes&a=index');
        $id = Cliente::create($_POST); redirect('c=clientes&a=edit&id='.$id);
    }
    public function edit(): void {
        $id=(int)($_GET['id']??0); $c=Cliente::find($id);
        if(!$c){ http_response_code(404); echo 'Cliente no encontrado'; return; }
        $this->view('clientes/edit', ['cliente'=>$c,'view'=>'clientes/edit']);
    }
    public function update(): void {
        if (method()!=='POST') redirect('c=clientes&a=index');
        Cliente::update((int)$_POST['id'], $_POST); redirect('c=clientes&a=index');
    }
    public function destroy(): void { Cliente::delete((int)($_GET['id']??0)); redirect('c=clientes&a=index'); }
}