<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function check(){
        $role = Auth()->user()->get_role['name'];
        return to_route($role.'.index');
    }
}
