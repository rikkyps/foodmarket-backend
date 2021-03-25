<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Fortify\Rules\Password;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    use PasswordValidationRules;
    public function login(Request $request) {
        try{
            //Validasi input request
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            //Cek credentials
            $credentials = $request->only(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error(['message' => 'Unauthorized'], 'Authentication Failed', 500);
            }

            //Jika password tidak sesuai maka return error message
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password)) {
                throw new Exception('Invalid Credentials');
            }


            //Jika login berhasil
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');

        } catch(Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function register(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => 'required',
                'address' => 'required',
                'houseNumber' => 'required',
                'phoneNumber' => 'required',
                'city' => 'required',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'houseNumber' => $request->houseNumber,
                'phoneNumber' => $request->phoneNumber,
                'city' => $request->city,
                'password' => Hash::make($request->password)
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult, 
                'token_type' => 'Bearer', 
                'user' => $user
            ], 'User registered');

        } catch (Exception $error) {
            return ResponseFormatter::error(
                ['message' => 'Something went wrong', 'errors' => $error->errors()],
                'Authentication Failed',
                500
            );
        }
    }

    public function logout(Request $request) {
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function fetch(Request $request) {
        return ResponseFormatter::success($request->user(), 'profile data was successfully loaded');
    }

    public function updateProfile(Request $request) {
        $data = $request->all();
        $user = Auth::user();

        $user->update($data);
        return ResponseFormatter::success($user, 'Profile Updated');
    }

    public function uploadPhoto(Request $request) {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                ['error' => $validator->errors()],
                'Upload photo fails',
                401
            );
        }

        if ($request->file('file')) {
            $file = $request->file->store('assets/user','public');

            //simpan photo path ke database
            $user = Auth::user();
            $user->profile_photo_path = $file;
            $user->update();

            return ResponseFormatter::success([$file], 'Photo was successfully uploaded');
        }
    }
}
