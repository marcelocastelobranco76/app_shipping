<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\Customer;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request)
    {
    	//Validate data
        $data = $request->only('name', 'email', 'password', "phone");
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:customers',
            'password' => 'required|string|min:6|max:50',
            'phone' => 'required|string'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new customer
        $customer = Customer::create([
        	'name' => $request->name,
        	'email' => $request->email,
        	'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);

        //Customer created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Cliente cadastrado com sucesso',
            'data' => $customer
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
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Login inválido. Tente novamente.',
                ], 400);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Erro ao criar o token.',
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
                'message' => 'Cliente deslogou com sucesso'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Cliente não pode deslogar'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function get_customer(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $customer = JWTAuth::authenticate($request->token);
 
        return response()->json(['customer' => $customer]);
    }
}