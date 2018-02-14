<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class authJWT {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
//        try {
//            $user = JWTAuth::toUser($request->input('token'));
//        } catch (Exception $e) {
//            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
//                return response()->json(['error'=>'Token is Invalid']);
//            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
//                return response()->json(['error'=>'Token is Expired']);
//            }else{
//                return response()->json(['error'=>'Something is wrong']);
//            }
//        }
//        return $next($request);
        // caching the next action
        $response = $next($request);

        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return ApiHelpers::ApiResponse(101, null);
            }
        } catch (TokenExpiredException $e) {
            // If the token is expired, then it will be refreshed and added to the headers
            try {
                $refreshed = JWTAuth::refresh(JWTAuth::getToken());
                $response->header('Authorization', 'Bearer ' . $refreshed);
            } catch (JWTException $e) {
                return ApiHelpers::ApiResponse(103, null);
            }
            $user = JWTAuth::setToken($refreshed)->toUser();
        } catch (JWTException $e) {
            return ApiHelpers::ApiResponse(101, null);
        }

        // Login the user instance for global usage
        Auth::login($user, false);

        return $response;
    }

}
