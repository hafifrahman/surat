<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMode
{
    public function handle($request, Closure $next)
    {
        if ($this->isMaintenanceMode() && !$this->isExcludedRoute($request)) {
            return response()->view('maintenance'); // atau view pemeliharaan Anda
        }

        return $next($request);
    }

    protected function isMaintenanceMode()
    {
        return file_exists(storage_path('framework/down'));
    }

    protected function isExcludedRoute($request)
    {
        $excludedRoutes = [
            'login',
            'register',
            '/',
        ];

        foreach ($excludedRoutes as $route) {
            if ($request->is($route)) {
                return true;
            }
        }

        return false;
    }
}
