<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lang;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = Lang::locale();

        if (auth()->check() && auth()->user()->is_admin == 1) {
            //dd(auth());

            return $next($request);
        }

        $status = '';

        if($lang == 'fr'){
            $status = 'Vous n avez pas accès à cet route !';
        }else if ($lang == 'en'){
            $status = 'You do not have access to this route !';
        }else{
            $status = 'Sie haben keinen Zugang zu dieser Route!';      
        }


        return redirect()->route('home')->withMessage($status);
    }
}
