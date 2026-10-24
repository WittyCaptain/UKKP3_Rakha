<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManualController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        
        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email|unique:users,email',
            'no_tp'=>'required|string|max:20|unique:users,no_tp',
            'password'=>'required|min:8|confirmed',
        ]);

        $customerRole = role::where('role', 'customer')->firstOrFail();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_tp' => $request->no_tp,
            'password' => Hash::make($request->password),
            'role_id' => $customerRole->id
        ]);

        return redirect()->route('login')->with('success', 'registration successful');

    }

    public function loginProses(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password) ) {
            Auth::login($user);

            $nama = $request->input('email');

            session(['email' => $nama]);

            if ($user->role->role === 'admin') {
                return redirect()->route('pengaduan.index');
            } elseif ($user->role->role === 'customer') {
                return redirect()->route('pengaduan.create');
            }

            return back()->withErrors([
                'email' => 'Role user tidak valid!'
            ]);
        }
    }

    public function logout(Request $request){

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
