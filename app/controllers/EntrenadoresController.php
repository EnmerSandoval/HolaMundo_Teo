<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Entrenador;
class EntrenadoresController extends Controller {
    public function index(): void { $this->view('entrenadores/index',['entrenadores'=>Entrenador::all(),'view'=>'entrenadores/index']); }
    public function create(): void { $this->view('entrenadores/create',['view'=>'entrenadores/create']); }
    public function store(): void { if (method()!=='POST') redirect('c=entrenadores&a=index'); $id=Entrenador::create($_POST); redirect('c=entrenadores&a=edit&id='.$id); }
    public function edit(): void { $id=(int)($_GET['id']??0); $e=Entrenador::find($id); if(!$e){http_response_code(404);echo'Entrenador no encontrado';return;} $this->view('entrenadores/edit',['entrenador'=>$e,'view'=>'entrenadores/edit']); }
    public function update(): void { if (method()!=='POST') redirect('c=entrenadores&a=index'); Entrenador::update((int)$_POST['id'], $_POST); redirect('c=entrenadores&a=index'); }
    public function destroy(): void { Entrenador::delete((int)($_GET['id']??0)); redirect('c=entrenadores&a=index'); }
}