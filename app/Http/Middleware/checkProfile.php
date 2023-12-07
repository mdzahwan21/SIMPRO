<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkProfile extends Middleware
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->role === 'mahasiswa' && empty($user->mahasiswa->no_telp)) {
            return redirect()->route('completeProfile');
        }

        return $next($request);
    }
}