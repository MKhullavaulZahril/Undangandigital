<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    /**
     * Handle an incoming request untuk melindungi halaman admin.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = env('ADMIN_USER', 'admin');
        $password = env('ADMIN_PASS', 'secret');

        // Cek kredensial Basic Auth dari header request
        if ($request->getUser() !== $username || $request->getPassword() !== $password) {
            return response('Unauthorized.', 401)->header('WWW-Authenticate', 'Basic realm="Admin Area"');
        }

        return $next($request);
    }
}
