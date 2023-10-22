<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    public function join($id_grupo){
        if(Session::get('user') && !empty($id_grupo)){
            $model = new UserGroup();
            
            $model->id_grupo = $id_grupo;
            $model->id_usuario = Session::get('user')->id;

            $model->save();

            return redirect()->route('group.join');
        }else{ 
            return redirect()->route('welcome');
        }
    }
}
