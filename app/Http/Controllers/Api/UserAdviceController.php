<?php

namespace App\Http\Controllers\Api;

use App\Models\UserAdvice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAdviceController extends Controller
{
    public function index() {
        $userAdvices = UserAdvice::all();
        if($userAdvices->count() > 0) {

            return response()->json([
                'status' => 200,
                'users-advices' => $userAdvices
            ], 200);
        
        } else {

            return response()->json([
                'status' => 404,
                'message' => 'No Record Found'
            ], 404);
        
        }

    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'senha' => 'required|string|max:191',
            'email' => 'required|email|max:191',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $userAdvices = UserAdvice::create([
                'name' => $request->name,
                'senha' => $request->senha,
                'email' => $request->email,
            ]);

            if($userAdvices) {
                return response()->json([
                    'status' => 200,
                    'message' => "User Created Successfuly"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong"
                ], 500);
            }
        }
    }

    // public function show($id) {
    //     $userAdvices = UserAdvice::find($id);
    //     if($userAdvices) {
    //         return response()->json([
    //             'status' => 200,
    //             'student' => $userAdvices
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => "No Shuch Student Found!"
    //         ], 404);
    //     }
    // }
}
