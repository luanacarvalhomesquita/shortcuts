<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        if(Auth::check()) {
            return redirect()->intended();
        }

        return inertia(PagesVue::PAGE_LOGIN);
    }

    public function store(LoginRequest $request)
    {
        $auth = Auth::attempt($request->all(), true);
        if(!$auth) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password.'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended()->with('success', 'Autenticado com sucesso!');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
