<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesPermission extends Controller
{
    public function roles()
    {
        return view('admin.Roles and Permissions.role-list');
    }
    public function permissions()
    {
        return view('admin.Roles and Permissions.permissions');
    }

    public function role_permission_list(){
        return view('admin.Roles and Permissions.role-permission-list');
    }

    public function user_list(){
        return view('admin.Roles and Permissions.user-list');
    }
}
