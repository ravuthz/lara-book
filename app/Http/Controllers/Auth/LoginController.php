<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Check input is email or username
    private function field() {
        return filter_var(request()->get('username'), FILTER_VALIDATE_EMAIL);
    }
    
    // Override login field
    public function username() 
    {
        return $this->field() ? 'email' : 'username';
    }
    
    // Override login validate
    protected function validateLogin(Request $request)
    {
        $field = $this->field() ? 'email' : 'username';
        $rules = $this->field() ? 'required|email|max:255' : 'required|max:255';
        $request->merge([$field => $request->get('username')]);
        
        $this->validate($request, [
            $field => $rules,
            'password' => 'required|string'
        ]);
    }
    
}
