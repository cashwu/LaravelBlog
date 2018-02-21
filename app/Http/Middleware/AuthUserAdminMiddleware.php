<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/21
 * Time: 14:45
 */

namespace App\Http\Middleware;

use Closure;

class AuthUserAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $userId = session()->get("user_id");
        if (is_null($userId)) {
            return redirect()->to("/admin/login");
        }
        return $next($request);
    }
}