<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;

class ApiController extends Controller
{
  public function __construct()
  {

      // print_r("nesto");die;
      $this->user = new User;
//      print_r("nesto");
      // die;

  }

  public function login(Request $request){
    // print_r("nesto");die;
      $credentials = $request->only('email', 'password');
      $token = null;
      try {
          if (!$token = JWTAuth::attempt($credentials)) {
              return response()->json([
                  'response' => 'error',
                  'message' => 'invalid_email_or_password',
              ]);
          }
      } catch (JWTAuthException $e) {
          return response()->json([
              'response' => 'error',
              'message' => 'failed_to_create_token',
          ]);
      }
      return response()->json([
          'response' => 'success',
          'result' => [
              'token' => $token,
          ],
      ]);
  }

  public function getAuthUser(Request $request){
//    print_r("nesto");die;
      $user = JWTAuth::toUser($request->token);
      return response()->json(['result' => $user->only('id', 'ime', 'email')]);
      // return true;
  }

}
