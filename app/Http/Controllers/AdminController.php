<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.main', compact('users'));
    }

    
    public function destroy(User $user)
    {
        $user->delete();
            return redirect()->back();
    }

    public function update(User $user, Request $request)
    {
        $user->update([
            'role'=>$request->get('role')
        ]);
        
        return redirect()->back();
    }
}
