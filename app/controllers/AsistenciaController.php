<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Asistencia;
use App\Models\Cliente;
use App\Models\Entrenador;
class AsistenciaController extends Controller {
    public function index(): void { $this->view('asistencia/index',['asistencias'=>Asistencia::all(),'view'=>'asistencia/index']); }
    public function create(): void { $this->view('asistencia/create',['clientes'=>Cliente::all(),'entrenadores'=>Entrenador::all(),'view'=>'asistencia/create']); }
    public function store(): void { if (method()!=='POST') redirect('c=asistencia&a=index'); $id=Asistencia::create($_POST); redirect('c=asistencia&a=edit&id='.$id); }
    public function edit(): void { $id=(int)($_GET['id']??0); $a=Asistencia::find($id); if(!$a){http_response_code(404);echo'Asistencia no encontrada';return;} $this->view('asistencia/edit',['asistencia'=>$a,'clientes'=>Cliente::all(),'entrenadores'=>Entrenador::all(),'view'=>'asistencia/edit']); }
    public function update(): void { if (method()!=='POST') redirect('c=asistencia&a=index'); Asistencia::update((int)$_POST['id'], $_POST); redirect('c=asistencia&a=index'); }
    public function destroy(): void { Asistencia::delete((int)($_GET['id']??0)); redirect('c=asistencia&a=index'); }
}