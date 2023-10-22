<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Implement;

class ImplementController extends Controller
{
    public function index($id){
        if($id){
            $imple = new Implement();
            $imple = $imple->where('id_salon', '=', $id)->orderBy('id', 'desc')->get();

            return view('implements.index', [
                'implements' => $imple,
                'id' => $id
            ]);
        }else{
            return redirect()->route('classroom.index');
        }
    }

    public function create($id){
        return view('implements.create', ['id' => $id]);
    }

    public function save(Request $req){
        $validate = $req->validate([
            'nombre' => 'required',
            'comentario' => 'required',
            'id' => 'required'
        ]);

        if($validate){
            $imp = new implement();
            $imp->nombre = $req->input('nombre');
            $imp->comentario = $req->input('comentario');
            $imp->id_salon = $req->input('id');
            $imp->id_institucion = Session::get('institution')->id;

            $imp->save();
        }

        return redirect()->route('implements.index', ['id' => $req->input('id')]);
    }

    public function edit($id){
        if($id){
            $imp = new Implement();
            $imp = $imp->find($id);

            return view('implements.edit', ['implement' => $imp]);
        }else{
            return redirect()->route('classroom.index');
        }
    }

    public function update(Request $req){
        $validate = $req->validate([
            'nombre' => 'required',
            'comentario' => 'required',
            'id' => 'required'
        ]);

        if($validate){
            $imp = new Implement();
            $imp = $imp->find($req->input('id'));

            if($imp->id_institucion == Session::get('institution')->id){
                $imp->nombre = $req->input('nombre');
                $imp->comentario = $req->input('comentario');

                $imp->update();
            }else{
                return redirect()->route('classroom.index');
            }
        }

        return redirect()->route('implements.index', ['id' => $imp->id_salon]);
    }

    public function delete($id){
        if($id){
            $imp = new Implement();
            $imp = $imp->find($id);
    
            if($imp->id_institucion == Session::get('institution')->id){
                $imp->delete();

                return redirect()->route('implements.index', ['id' => $imp->id_salon]);
            }else{
                return redirect()->route('classroom.index');
            }
        }else{
            return redirect()->route('classroom.index');
        }
    }
}
