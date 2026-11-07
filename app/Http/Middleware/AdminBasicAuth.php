<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $configUser = config('admin.username');
        $configPass = config('admin.password');

        if (empty($configUser) || empty($configPass)) {
            abort(503, 'Kredensial admin belum dikonfigurasi di file .env.');
        }

        $inputUser = (string) ($request->getUser() ?? '');
        $inputPass = (string) ($request->getPassword() ?? '');

        if (!hash_equals((string) $configUser, $inputUser) || !hash_equals((string) $configPass, $inputPass)) {
            return response('Unauthorized.', 401, [
                'WWW-Authenticate' => 'Basic realm="Admin Undangan"',
            ]);
        }

        return $next($request);
    }
}
