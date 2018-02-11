<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        if ($request->has('q')) {
            $data['users'] = User::where('username', 'LIKE', $request->get('q') . '%')->paginate(8);
        } else {
            $data['users'] = User::paginate(8);    
        }
        
        $data['searchUrl'] = route('users.search');
        return view('users.index', $data);
    }
    
    public function show(User $user) {
        $data['user'] = $user;
        return view('users.show', $data);
    }
}
