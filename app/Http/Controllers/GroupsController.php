<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Groups;

class GroupsController extends Controller{
    
    public function index(){
        if(Session::get('institution')){
            $group = new Groups();
            $institution = Session::get('institution');

            $groups = $group->where('id_institucion', '=', $institution->id)
                    ->orderBy('id', 'desc')->get();

            return view('group.index', ['groups' => $groups]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function create(){
        if(Session::get('institution')){
            return view('group.create');
        }else{
            return redirect()->route('welcome');
        }
    }

    public function save(Request $req){
        $validate = $req->validate([
            'codigo' => 'required',
            'num_doc_profesor' => 'required',
            'comentario' => 'required'
        ]);

        if($validate){
            $group = new Groups();
            $teacher = new User();
            $institution = Session::get('institution');

            $teacherInfo = $teacher->where('rol', '=', 'profesor')
                            ->where('num_doc', '=', $req->input('num_doc_profesor'))->first();

            $group->codigo = $req->input('codigo');
            $group->id_docente = $teacherInfo->id;
            $group->comentario = $req->input('comentario');
            $group->id_institucion = $institution->id;

            $group->save();
        }

        return redirect()->route('group.index');
    }

    public function edit($id){
        if(Session::get('institution')){
            if($id){
                $groupModel = new Groups();
                $userModel = new User();

                $group = $groupModel->find($id);
                $teacher = $userModel->where('rol', '=', 'profesor')
                        ->where('id', '=', $group->id_docente)->first();


                return view('group.edit', ['group'=>$group, 'teacher'=>$teacher]);
            }else{
                return redirect()->route('group.index');
            }
        }else{
            return redirect()->route('welcome');
        }
    }

    public function update(Request $req){
        $institution = Session::get('institution');
        $groupModel = new Groups();
        $group = $groupModel->find($req->input('group_id'));

        if($group->id_institucion == $institution->id){
            $userModel = new User();
            $teacher = $userModel->where('rol', '=', 'profesor')
                        ->where('num_doc', '=', $req->input('num_doc_profesor'))->first();

            $group->codigo = $req->input('codigo');
            $group->id_docente = $teacher->id;
            $group->comentario = $req->input('comentario');

            $group->update();
        }

        return redirect()->route('group.index');
    }

    public function delete($id){
        if(Session::get('institution')){
            if($id){
                $institution = Session::get('institution');
                $groupModel = new Groups();
                $group = $groupModel->find($id);

                if($group->id_institucion == $institution->id){
                    $group->delete();
                }else{
                    return redirect()->route('group.index');
                }
            }else{
                return redirect()->route('group.index');
            }

            return redirect()->route('group.index');

        }else{
            return redirect()->route('welcome');
        }
    }

    public function list(){
        if(Session::get('teacher')){
            $gr = new Groups();

            $gr = $gr->where('id_docente', '=', Session::get('teacher')->id)
                    ->orderBy('id', 'desc')->get();

            return view('group.list', ['groups'=>$gr]);
        }elseif(Session::get('user')){
            $gr = new Groups();
            $gr = $gr->whereIn('id', function($query){
                $query->select('id_grupo')->from('usuario_grupo')->where('id_usuario', '=', Session::get('user')->id);
            })->get();

            return view('group.list', ['groups'=>$gr]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function join(){
        if(Session::get('user')){
            $gr = new Groups();
            $gr = $gr->whereNotIn('id', function($q){
                $q->select('id_grupo')->from('usuario_grupo')->where('id_usuario', '=', Session::get('user')->id);
            })->get();

            return view('group.join', ['groups'=>$gr]);
        }else{
            return redirect()->route('welcome');
        }
    }
}
