<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index(){
        if(Session::get('institution')){
            $insti = Session::get('institution');
            $class = new Classroom();
            $classrooms = $class->where('id_institucion', '=', $insti->id)
                                ->orderBy('id', 'desc')->get();
    
            return view('classroom.index', ['classrooms' => $classrooms]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function create(){
        if(Session::get('institution')){
            return view('classroom.create');
        }else{
            return redirect()->route('welcome');
        }
    }

    public function save(Request $req){
        $validate = $req->validate([
            'comentario' => 'required',
            'capacidad' => 'required'
        ]);

        if($validate){
            $insti = Session::get('institution');
            $class = new Classroom();

            $class->id_institucion = $insti->id;
            $class->comentario = $req->input('comentario');
            $class->capacidad = $req->input('capacidad');

            $class->save();
        }

        return redirect()->route('classroom.index');
    }

    public function edit($id){
        if(Session::get('institution')){
            $class = new Classroom();
            $class = $class->find($id);
            
            if($class->id_institucion == Session::get('institution')->id){
                return view('classroom.edit', ['class' => $class]);
            }
        }else{
            return redirect()->route('welcome');
        }
    }

    public function update(Request $req){
        $validate = $req->validate([
            'comentario' => 'required',
            'capacidad' => 'required',
            'id' => 'required',
        ]);

        $class = new Classroom();
        $class = $class->find($req->input('id'));
        
        if($validate && $class->id_institucion == Session::get('institution')->id){
            $class->comentario = $req->input('comentario');
            $class->capacidad = $req->input('capacidad');

            $class->update();
        }

        return redirect()->route('classroom.index');

    }

    public function delete($id){
        if(Session::get('institution')){
            $class = new Classroom();
            $class = $class->find($id);
            $insti = Session::get('institution');

            if($insti->id == $class->id_institucion){
                $class->delete();
            }

            return redirect()->route('classroom.index');
        }else{
            return redirect()->route('welcome');
        }
    }


    public function reserve(){
        if(Session::get('teacher')){
            $class = new Classroom();
            $class = $class->where('id_institucion', '=', Session::get('teacher')->id_institucion)
                            ->where('horario', '=', 'Ninguno')
                            ->where('id_grupo', '=', NULL)
                            ->orderBy('id', 'desc')->get();

            return view('classroom.index', ['classrooms'=>$class]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function classReserveForm($id){
        if(Session::get('teacher') && $id){
            $class = new Classroom();
            $class = $class->find($id);

            return view('classroom.reserve', ['class'=>$class]);
        }else{
            return redirect()->route('classroom.reserve');
        }
    }

    public function saveReserva(Request $req){
        $validate = $req->validate([
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'grupo' => 'required',
            'id' => 'required',
        ]);

        if($validate){
            $class = new Classroom();
            $class = $class->find($req->input('id'));
            $horario = "{$req->input('fecha')}|{$req->input('hora_inicio')}|{$req->input('hora_fin')}";

            $class->horario = $horario;
            $class->id_grupo = $req->input('grupo');
            $class->id_profesor = Session::get('teacher')->id;

            $class->update();

            return redirect()->route('classroom.reserve');
        }
    }

    public function reserved(){
        if(Session::get('teacher')){
            $class = new Classroom();
            $class = $class
            ->where('id_profesor', '=', Session::get('teacher')->id)
                            ->orderBy('id', 'desc')->get();

            return view('classroom.reserved', ['class'=>$class]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function list(){
        if(Session::get('user')){
            $class = new Classroom();
            $class = $class->whereIn('id_grupo', function($q){
                $q->select('id_grupo')->from('usuario_grupo')->where('id_usuario', '=', Session::get('user')->id);
            })->get();


            return view('classroom.list', ['classes'=>$class]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function clean($id){
        if(Session::get('teacher')){
            $class = new Classroom();
            $class = $class->find($id);

            $class->horario = "Ninguno";
            $class->id_grupo = NULL;
            $class->id_profesor = NULL;

            $class->update();


            return view('teacher.index');
        }else{
            return redirect()->route('welcome');
        }
    }
}
