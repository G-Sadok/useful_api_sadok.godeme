<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Modules;
use Illuminate\Http\Request;

class UserModuleController extends Controller
{
     //Activate Module
    public function activate(Request $request)
    {

        $user = User::all();

        if (!$request->module_id) {
            return response()->json(['errors' => 'Error activating module'], 404);
        }

        $user_module = (new User_Modules())->update([
            'user_id' => $user[0]['id'],
            'module_id' =>$request->module_id,
            'active' => true,
        ]);

        return response()->json(["message" =>"Module activated", "user_id"=>$user, "module"=>$user_module], 201);
    }

    //Desactivate Module
    public function desactivate(Request $request)
    {

        $user = User::find('id');

        if (!$request->module_id) {
            return response()->json(['errors' => 'Error activating module'], 404);
        }

        $user_module = User_Modules::update([
            'user_id' => $user['id'],
            'module_id' =>$request->module_id,
            'active' => false,
        ]);



        return response()->json(["message" =>"Module desactivated", "user_id"=>$user['id'], "module"=>$user_module], 201);
    }

}
