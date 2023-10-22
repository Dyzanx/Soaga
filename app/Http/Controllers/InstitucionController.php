<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Classroom;

class InstitucionController extends Controller
{
    public function index(){
        if(Session::get('institution')){
            $institution = Session::get('institution');
            $class = new Classroom();
            $class = $class->where('id_institucion', '=', $institution->id)->orderBy('id','desc')->get();
        
            return view('institution/index', ['institution' => $institution, 'classrooms'=>$class]);
        }else{
            return redirect()->route('institution.enter');
        }
    }
    
    public function register(){
        if(Session::get('institution')){
            return redirect()->route('institution.index');
        }else{
            return view('institution/register');
        }
    }

    public function save(Request $req){
        
        $insti = new Institution();

        $insti->codigo_dane = $req->input('codigo_dane');
        $insti->nombre = $req->input('nombre');
        $insti->direccion = $req->input('direccion');
        $insti->telefono = $req->input('telefono');
        $insti->correo = $req->input('correo');
        $insti->contra = bcrypt($req->input('contra'));
        $insti->web = $req->input('web');

        $insti->save();

        return redirect()->route('institution.enter')->with('message', 'Registrado correctamente');
    }

    public function enter(){
        if(Session::get('institution')){
            return redirect()->route('institution.index');
        }else{
            return view('institution/login', ['institution'=> Session::get('institution')]);
        }
    }

    public function login(Request $req){
        $validate = $req->validate([
            'correo' => ['required', 'email'],
            'contra' => ['required'],
        ]);

        if($validate){
            $inst = new Institution();
            $institution = $inst
            ->where('correo', '=', $req->input('correo'))->first();
            // ->where('contra', '=', $req->input('contra'))
            
                
            if(!empty($institution) && Hash::check($req->input('contra'), $institution->contra)){
                Session::put('institution', $institution);
            }
        }
        
        return redirect()->route('institution.index')->with('message', 'Session created successfully');
    }

    public function edit(){
        $institution = Session::get('institution');
        return view('institution/edit', ['institution' => $institution]);
    }

    public function update(Request $req){
        $institution = Session::get('institution');
        $insti_id = $institution->id;

        $insti = Institution::find($insti_id);

        $insti->codigo_dane = $req->input('codigo_dane');;
        $insti->nombre = $req->input('nombre');;
        $insti->direccion = $req->input('direccion');;
        $insti->telefono = $req->input('telefono');;
        $insti->correo = $req->input('correo');;
        $insti->web = $req->input('web');;

        $insti->update();

        Session::put('institution', Institution::find($insti_id));

        return redirect()->route('institution.edit');
    }

    public function delete($id){
        $institution = Session::get('institution');
        $insti = Institution::find($id);

        if($insti->id == $institution->id){
            $insti->delete();
        }

        return redirect()->route('institution.register');
    }

    public function logout(){
        Session::put('institution', null);

        return redirect()->route('welcome');
    }
}
