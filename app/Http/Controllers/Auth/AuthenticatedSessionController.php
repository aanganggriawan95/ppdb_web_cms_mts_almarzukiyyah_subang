<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): RedirectResponse
{
    // 1. Proses login
    $request->authenticate();

    // 2. Regenerate session (security)
    $request->session()->regenerate();

    // 3. CEK ROLE (INI YANG KAMU TANYA)
    if (auth()->user()->role !== 'admin') {
        auth()->logout();

        return redirect('/login')->withErrors([
            'email' => 'Hanya admin yang boleh login'
        ]);
    }

    // 4. Redirect ke dashboard
    return redirect()->intended(route('dashboard', absolute: false));
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
