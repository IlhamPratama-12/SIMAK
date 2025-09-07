<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Show register form
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Store new user (pending approval)
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nip'   => ['required', 'string', 'max:50', 'unique:users,nip'],
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        ]);

        User::create([
            'nip'     => $request->nip,
            'name'    => $request->name,
            'email'   => $request->email,
            'password'=> bcrypt('default123'), // dummy password
            'status'  => 'pending',
        ]);

        return redirect()->route('login')
            ->with('status', 'Registrasi berhasil. Menunggu persetujuan admin.');
    }
}
