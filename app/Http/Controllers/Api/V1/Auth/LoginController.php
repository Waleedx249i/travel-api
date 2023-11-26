<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

/**
 * @group User Login 
 * */
class LoginController extends Controller
{
    /**
     * @apiResourceModel App\Models\User
     * @response {"access_token":"d7266ac0c0bf6850a3d2e69b9aa1c084c0984acda68e2fe8f093236aee9694"}
     * @unauthenticated
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'the provided credentials are incorect'], 422);
        }

        $device = substr($request->userAgent() ?? '', 0, 255);

        return response()->json(['access_token' => $user->createToken($device)->plainTextToken]);
    }
}
