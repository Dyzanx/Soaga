<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institution;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        if(Session::get('user') || Session::get('teacher')){
            if(Session::get('teacher')){
                $user = Session::get('teacher');
            }else{
                $user = Session::get('user');
            }
            return view('user.index', ['user' => $user]);
        }else{
            return redirect()->route('user.enter');
        }
    }

    public function register(){
        if(Session::get('user')){
            return redirect()->route('user.index');
        }else{
            return view('user.register');            
        }
    }

    public function save(Request $req){
        $validate = $req->validate([
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'nombre' => 'required',
            'f_naci' => 'required',
            'celular' => 'required',
            'eps' => 'required',
            'correo' => 'required',
            'contra' => 'required',
            'codigo' => 'required'
        ]);

        $insti = new Institution();
        $institution = $insti->where('codigo_dane', '=', $req->input('codigo'))->first();

        if($validate && $institution){
            $user = new User();

            $user->tipo_doc = $req->input('tipo_doc');
            $user->num_doc = $req->input('num_doc');
            $user->nombre = $req->input('nombre');
            $user->f_naci = $req->input('f_naci');
            $user->eps = $req->input('eps');
            $user->correo = $req->input('correo');
            $user->contra = bcrypt($req->input('contra'));
            $user->celular = $req->input('celular');
            $user->id_institucion = $institution->id;

            $user->save();
        }

        return redirect()->route('welcome');
    }

    public function enter(){
        if(Session::get('user')){
            return redirect()->route('user.index');
        }else{
            return view('user.login');
        }
    }

    public function login(Request $req){
        $validate = $req->validate([
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'correo' => 'required',
            'contra' => 'required'
        ]);

        if($validate){
            $user = new User();
            $userInfo = $user->where('correo', '=', $req->input('correo'))
            ->where('tipo_doc', '=', $req->input('tipo_doc'))
            ->where('num_doc', '=', $req->input('num_doc'))
            ->first();

            if(!empty($userInfo) && Hash::check($req->input('contra'), $userInfo->contra)){
                if($userInfo->rol == 'profesor'){
                    Session::put('teacher', $userInfo);
                }else{
                    Session::put('user', $userInfo);
                }
            }
        }

        return redirect()->route('user.index');
    }

    public function logout(){
        Session::put('user', null);
        Session::put('teacher', null);

        return redirect()->route('user.enter');
    }

    public function profile($id){
        if(Session::get('user')){
            $user = new User();
            $user = $user->find($id);

            return view('user.profile', ['user'=>$user]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function edit(){
        if(Session::get('user')){
            return view('user.edit', ['user'=>Session::get('user')]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function update(Request $req){
        $validate = $req->validate([
            'id'=>'required',
            'tipo_doc'=>'required',
            'num_doc'=>'required',
            'nombre'=>'required',
            'f_naci'=>'required',
            'celular'=>'required',
            'eps'=>'required',
            'correo'=>'required',
        ]);

        if($validate){
            $user = new User();
            $user = $user->find($req->input('id'));

            if($user->id == Session::get('user')->id){
                $user->tipo_doc = $req->input('tipo_doc');
                $user->num_doc = $req->input('num_doc');
                $user->nombre = $req->input('nombre');
                $user->f_naci = $req->input('f_naci');
                $user->celular = $req->input('celular');
                $user->eps = $req->input('eps');
                $user->correo = $req->input('correo');

                $user->update();

                $user = new User();
                $user = $user->find($req->input('id'));
                Session::put('user', $user);

                return redirect()->route('user.profile',['id'=>$req->input('id')]);
            }
        }
    }
}
