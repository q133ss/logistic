<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function info($id){
        $company = User::find($id);
        return ['data' => $company];
    }
}
