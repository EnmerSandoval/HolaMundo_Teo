<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Plan;
class PlanesController extends Controller {
    public function index(): void { $this->view('planes/index', ['planes'=>Plan::all(),'view'=>'planes/index']); }
    public function create(): void { $this->view('planes/create', ['view'=>'planes/create']); }
    public function store(): void { if (method()!=='POST') redirect('c=planes&a=index'); $id=Plan::create($_POST); redirect('c=planes&a=edit&id='.$id); }
    public function edit(): void { $id=(int)($_GET['id']??0); $p=Plan::find($id); if(!$p){http_response_code(404);echo'Plan no encontrado';return;} $this->view('planes/edit',['plan'=>$p,'view'=>'planes/edit']); }
    public function update(): void { if (method()!=='POST') redirect('c=planes&a=index'); Plan::update((int)$_POST['id'], $_POST); redirect('c=planes&a=index'); }
    public function destroy(): void { Plan::delete((int)($_GET['id']??0)); redirect('c=planes&a=index'); }
}