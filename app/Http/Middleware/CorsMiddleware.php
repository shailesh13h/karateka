<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//         $domain=  ['*'];
//         if(isset($request->server()['HTTP_ORIGIN'])){
//
//             $origin =$request->server()['HTTP_ORIGIN'];
//             if(in_array($origin,$domain)){
               header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS');
               header('Access-Control-Allow-Headers:Origin, Content-Type,Authorization,If-Modified-Since');


//             }
//
//
//         }

        return $next($request);

            ///->header('Access-Control-Allow-Origin', '*');
            //->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
  }
}
