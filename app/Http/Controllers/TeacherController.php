<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    public function index(){
        if(Session::get('institution')){
            $tea = new User();

            if(isset($_GET['query']) && !empty($_GET['query'])){
                $tea = $tea->where('rol', '=', 'profesor')
                            ->where('id_institucion', '=', Session::get('institution')->id)
                            ->where('num_doc', 'like', "%{$_GET['query']}%")
                            ->orWhere('correo', 'like', "%{$_GET['query']}%")
                            ->orWhere('nombre', 'like', "%{$_GET['query']}%")
                            ->orWhere('celular', 'like', "%{$_GET['query']}%")->get();
            }else{
                $tea = $tea->where('rol', '=', 'profesor')
                        ->where('id_institucion', '=', Session::get('institution')->id)
                        ->orderBy('id', 'desc')->get();
            }

            return view('teacher.index', ['teachers' => $tea]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function add(){
        if(Session::get('institution')){
            $tea = new User();

            if(isset($_GET['query']) && !empty($_GET['query'])){
                $tea = $tea->where('rol', '=', 'estudiante')
                            ->where('id_institucion', '=', Session::get('institution')->id)
                            ->where('num_doc', 'like', "%{$_GET['query']}%")
                            ->orWhere('correo', 'like', "%{$_GET['query']}%")
                            ->orWhere('nombre', 'like', "%{$_GET['query']}%")
                            ->orWhere('celular', 'like', "%{$_GET['query']}%")->get();
            }else{
                $tea = $tea->where('rol', '=', 'estudiante')->orderBy('id', 'desc')->get();
            }

            return view('teacher.index', ['teachers'=>$tea, 'add'=>true]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function change($id, $rol){
        if(Session::get('institution') && !empty($rol)){
            $tea = new User();
            $tea = $tea->find($id);

            $tea->rol = $rol;

            $tea->update();

            return redirect()->route('teacher.index');
        }else{
            return redirect()->route('welcome');
        }
    }

    public function detail($id_docente){
        if(!empty($id_docente) && Session::get('institution') || !empty($id_docente) && Session::get('user')){
            $tea = new User();
            $tea = $tea->find($id_docente);

            return view('teacher.detail', ['teacher'=>$tea]);
        }else{
            return redirect()->route('welcome');
        }
    }
}
