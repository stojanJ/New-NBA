<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForbidenWords
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
        $forbidden_words = [
            'hate',
            'stupid',
            'idiot',
        ];

        foreach ($forbidden_words as $word) {
            if(strstr($request->content, $word)) {
                return response(view('teams.forbidden-comment'));
            }
        }
        return $next($request);
    }
}
