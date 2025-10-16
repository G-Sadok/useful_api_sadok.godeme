<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Modules;
use Illuminate\Http\Request;

class UserModuleController extends Controller
{
     //Activate Module
    public function activate($id)
    {

        $user = User::all()[2];

        if (!$id) {
            return response()->json(['errors' => 'Error activating module'], 404);
        }

        $user_module = User_Modules::create([
            'user_id' => $user['id'],
            'module_id' =>$id,
            'active' => true,
        ]);

        return response()->json(["message" =>"Module activated", "user_id"=>$user, "module"=>$user_module], 201);
    }

    //Desactivate Module
    public function desactivate($id)
    {

        $user = User::find('id');

        if (!$id) {
            return response()->json(['errors' => 'Error activating module'], 404);
        }

        $user_module = User_Modules::update([
            'user_id' => $user['id'],
            'module_id' =>$id,
            'active' => false,
        ]);



        return response()->json(["message" =>"Module desactivated", "user_id"=>$user['id'], "module"=>$user_module], 201);
    }

}
