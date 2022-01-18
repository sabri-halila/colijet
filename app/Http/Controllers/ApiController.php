<?php

namespace App\Http\Controllers;

use App\Models\colis;
use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        //Validate data
        $data = $request->only('name', 'cin', 'num', 'email', 'password', 'rib');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'cin' => 'required|string',
            'num' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50'
        ]);
        if ($request->img) {

            $broucher_64 = $request->img; //your base64 encoded data

            $extension = explode('/', explode(':', substr($broucher_64, 0, strpos($broucher_64, ';')))[1])[1];   // .jpg .png .pdf

            $replace = substr($broucher_64, 0, strpos($broucher_64, ',') + 1);

            // find substring fro replace here eg: data:image/png;base64,

            $broucher = str_replace($replace, '', $broucher_64);

            $broucher = str_replace(' ', '+', $broucher);

            $brouchername = rand(100000000000, 99999999999999) . '.' . $extension;

            Storage::disk('public')->put('/avatar/' . $brouchername, base64_decode($broucher));

            $img = '/storage/avatar/' . $brouchername;

        } else {
            $img = '/storage/avatar/logo.svg';
        }


        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        //Request is valid, create new user
        $user = new User();

        $user->name = $request->name;
        $user->cin = $request->cin;
        $user->rib = $request->rib;
        $user->num = $request->num;
        $user->email = $request->email;
        $user->img = $img;
        $user->password = bcrypt($request->password);
        $user->cpas = $request->password;
        $user->save();
        //User created, return success response
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
            return $credentials;
            return response()->json([
                'success' => false,
                'message' => 'Could not create token.',
            ], 500);
        }

        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated, do logout
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get_user(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }


    public function update(Request $request, User $user)
    {
        //Validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'cin' => 'required',
            'num' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update user
        $user = $user->update([
            'name' => $request->name,
            'cin' => $request->cin,
            'num' => $request->num,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //Colis updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Profile Modifié',
            'data' => $user
        ], Response::HTTP_OK);
    }


}
