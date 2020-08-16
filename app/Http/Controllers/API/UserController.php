<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return Response
     */

    /**
     * @OA\Post(
     *     path="/login",
     *     operationId="loginUser",
     *     tags={"User"},
     *     summary="login User",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Good not found"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     )
     * )
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */

    public function login()
    {
        if (!auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
        $user = auth()->user();
        $success['token'] = $user->createToken('MyApp')->accessToken;
        return response()->json(['success' => $success], $this->successStatus);

    }

    /**
     * Register api
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
//        return $this->sendResponse($success, 'User register successfully.');
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * details api
     *
     * @return JsonResponse
     */
    public function details()
    {
        $user = auth()->user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
