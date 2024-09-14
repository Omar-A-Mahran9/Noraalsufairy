<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:employee')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.employee_login');
    }


    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email'   => 'required|email|exists:employees',
            'password' => 'required|min:6'
        ]);


        if (Auth::guard('employee')->attempt($credentials, $request->has('remember_me'))) {

            $request->session()->regenerate();
            return response(['url' => redirect()->intended('/dashboard')->getTargetUrl()]);
        }else{

            throw ValidationException::withMessages([
                "password" => __("The password is incorrect"),
            ]);
        }


    }


    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect()->route('employee.login');
    }
}
