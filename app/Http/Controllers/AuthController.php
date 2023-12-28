<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
  
class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
  
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
  
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);
  
        return redirect()->route('login');
    }
  
    public function login()
    {
        return view('auth/login');
    }
  
    public function loginAction(Request $request)
{
    Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ])->validate();

    if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'customer') {
                return redirect()->route('customer.dashboard');
            }
        }

        // Default redirect if user or role is not available
        return redirect()->route('dashboard');
    }

    // If authentication fails
    throw ValidationException::withMessages([
        'email' => trans('auth.failed')
    ]);
}
  
public function logout(Request $request)
{
    // Check if the user is authenticated
    if (Auth::check()) {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect('/');
            } elseif ($user->role === 'customer') {
                return redirect('/');
            }
        }
    }

    // Default redirect if user is not authenticated or role is not available
    return redirect('/');
}


}