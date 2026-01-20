<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user) abort(401);

        if (!in_array($user->role, $roles, true)) {
            abort(403, 'Anda tidak berhak mengakses halaman ini.');
        }

        // Sekretaris harus valid: punya siswa_id dan jabatan sekretaris aktif
        if ($user->role === 'sekretaris' && !$user->isActiveSekretaris()) {
            abort(403, 'Akun sekretaris tidak valid atau masa jabatan berakhir.');
        }

        return $next($request);
    }
}
