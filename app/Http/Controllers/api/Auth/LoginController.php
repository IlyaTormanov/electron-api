<?php

namespace App\Http\Controllers\api\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'You cannot sign with those credentials',
                'errors' => 'Unauthorised'
            ], 401);
        }
        $user=Auth::user();
        $token = $user->createToken(config('app.name'));
//        $token->token->expires_at = $request->remember_me ?
//            Carbon::now()->addMonth() :
//            Carbon::now()->addDay();

        $token->token->save();
        return response()->json([
            'id'=>$user->id,
            'token' => $token->accessToken,
            'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
        ], 200);
    }
}
