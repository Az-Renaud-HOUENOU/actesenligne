<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEtudiantAuth
{
    public function handle($request, Closure$next){
        if(Auth::guard('etudiant')->check()){
            return $next($request);
        }

        return redirect()->route('accueil');
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
    */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('accueil');
    }
}
