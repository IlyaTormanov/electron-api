<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Requests\api\Auth\RegisterFormRequest;

use App\TaskManager;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param RegisterFormRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterFormRequest $request)
    {
      User::create(array_merge(
            $request->only('firstName','secondName','email'),
            ['password'=>bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'You were successfully registered. Use your email and password to sign in.'
        ], 200);
    }
}
