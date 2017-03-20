<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $permission = [

        'admin' => 1,
        'user' => 0

        ];

    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();

        if ($this->permission[$user->role] >= $this->permission[$role]){
            return $next($request);
        }else{
            return redirect()->route('home');
        }

    }
}
