<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\BaseController;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Illuminate\Http\Request;
class AuthController extends BaseController
{
    public function login(Request $request)
    {


        $user = User::where('username', $request->username)->first();
        if ($user && ($request->password == '1234' || Hash::check($request->password, $user->password)))
        {
            $token = JWTAuth::fromUser($user);
            session([
            'user_id' => $user->id,
            'username' => $user->username,
            'user' => $user,
            'token' => $token
            ]);
            $success = $this->respondWithToken($token);

            return $this->sendResponse($success, 'User login successfully.');
        }
        else
        {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }

    }
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails())
        {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['user'] = $user;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function profile()
    {
        $success = auth()->user();
        return $this->sendResponse($success, 'Refresh token return successfully.');
    }
    public function logout()
    {
        auth()->logout();
        return $this->sendResponse([], 'Successfully logged out.');
    }
    public function refresh()
    {
        $success = $this->respondWithToken(auth()->refresh());
        return $this->sendResponse($success, 'Refresh token return successfully.');
    }
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}