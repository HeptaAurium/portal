<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class CreateRolesController extends Controller
{
    //
    public function create_permissions()
    {
        $permission = Permission::create(['name' => 'activate-member']);
        $user = User::find(1);
        $user->givePermissionTo($permission);
    }
}
