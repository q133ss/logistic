<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $user = Auth()->user();
        return view('includes.settings', compact('user'));
    }

    public function save(Request $request){
       $validated = $request->validate([
           'name' => 'required',
           'phone' => 'required',
           'email' => 'required',
           'contact_face' => 'nullable|string',
           'bin' => 'nullable|int',
           'year' => 'nullable|int',
           'tenge_account' => 'nullable|int',
           'usd_account' => 'nullable|int'
       ]);
       $user = Auth()->user();
       $user->update($validated);
       return back()->withSuccess('Данные сохранены');
    }
}
