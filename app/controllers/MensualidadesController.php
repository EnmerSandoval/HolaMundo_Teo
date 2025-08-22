<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Mensualidad;
use App\Models\Cliente;
class MensualidadesController extends Controller {
    public function index(): void { $this->view('mensualidades/index',['mensualidades'=>Mensualidad::all(),'view'=>'mensualidades/index']); }
    public function create(): void { $this->view('mensualidades/create',['clientes'=>Cliente::all(),'view'=>'mensualidades/create']); }
    public function store(): void { if (method()!=='POST') redirect('c=mensualidades&a=index'); $id=Mensualidad::create($_POST); redirect('c=mensualidades&a=edit&id='.$id); }
    public function edit(): void { $id=(int)($_GET['id']??0); $m=Mensualidad::find($id); if(!$m){http_response_code(404);echo'Mensualidad no encontrada';return;} $this->view('mensualidades/edit',['mensualidad'=>$m,'clientes'=>Cliente::all(),'view'=>'mensualidades/edit']); }
    public function update(): void { if (method()!=='POST') redirect('c=mensualidades&a=index'); Mensualidad::update((int)$_POST['id'], $_POST); redirect('c=mensualidades&a=index'); }
    public function destroy(): void { Mensualidad::delete((int)($_GET['id']??0)); redirect('c=mensualidades&a=index'); }
}