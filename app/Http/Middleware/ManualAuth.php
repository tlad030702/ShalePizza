<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ManualAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln(ManualAuth::class);

        if (!Session::has('email')){
            $out->writeln('unauthenticated');
            return redirect()->route('auth.ask');
        } else {
            $out->writeln('authenticated: '.Session::get('email'));
        }

        return $next($request);
    }
}
