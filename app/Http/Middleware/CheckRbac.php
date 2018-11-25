<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Auth;

class CheckRbac
{
    public function handle($request, Closure $next)
    {
        if(Auth::guard('admin')->user()->role_id !=1){
          $route = Route::currentRouteAction();
          $ac = Auth::guard('admin')->user()->role->auth_ac;
          $ac = strtolower($ac.'indexcontroller@index,indexcontroller@welcome');
          $routeArr = explode('\\',$route);
          if (strpos($ac,strtolower(end($routeArr))) === false) {
              exit('<h1>您没有权限访问</h1>');
          }
        }
        return $next($request);
    }
}
