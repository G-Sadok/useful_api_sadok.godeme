<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Modules;
use App\Models\User;
use App\Models\User_Modules;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
public function show()
    {
        //$modules = Modules::all();
        $modules = Modules::all();
        $modules_user = User::all();

        return response()->json([['id' => $modules[0]['id'], 'name' =>$modules[0]['name'], 'description' =>$modules[0]['description']], ['id' => $modules[1]['id'], 'name' =>$modules[1]['name'], 'description' =>$modules[1]['description']], ['id' => $modules[2]['id'], 'name' =>$modules[2]['name'], 'description' =>$modules[2]['description']], ['id' => $modules[3]['id'], 'name' =>$modules[3]['name'], 'description' =>$modules[3]['description']], ['id' => $modules[4]['id'], 'name' =>$modules[4]['name'], 'description' =>$modules[4]['description']]] );
        //return response()->json($modules);
    }
}
