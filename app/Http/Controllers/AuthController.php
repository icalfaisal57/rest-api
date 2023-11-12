<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        // $input = [
        //     'name'=> $request-> name,
        //     'email'=> $request-> email,
        //     'password'=> $request-> password,
        // ];
        // //validasi
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required | email',
        //     'password' => 'required|confirmed|min:8',
        // ]);
        // //menginsert data ke tabel user
        $user = User::create($request->all());
        $data =[
            'message'=> 'User is created successfully',
            'data' => $user,
        ];
        return response()->json($data, 200);
        // dd($request->all());
    }
    public function login(Request $request){
        $input =[
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::where('email',$input['email'])->first();
        $isLoginSuccessfully=(
            $input['email'] == $user->email
            &&
            Hash::check($input['password'],$user -> password)
        );
        if($isLoginSuccessfully){
            $token = $user->createToken('auth_token');
            $data = [
                'message' => 'Login Successfully',
                'token' => $token->plainTextToken,
            ];
            return response()->json($data,200);
        }
        else{
            $data = [
                'message' => 'username or password is wrong'
            ];
            return response()->json($data,401);
        }
    }
}
