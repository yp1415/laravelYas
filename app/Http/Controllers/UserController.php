<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function GetAllUser() {
        $users = User::with(['courses:id,image,title,time,days,is_active'])->get();
        return response()->json([
            "massage" => "successfully",
            "users" => UserResource::collection($users)
        ], 200);
    }

    public function createNewUser(UsersRequest $request) {

        $user = User::create([
            'name'        => $request->name,
            'lastname'    => $request->lastname,
            'role'        => $request->role,
            'national_id' => $request->national_id,
            'mobile'      => $request->mobile,
            'password'    => Hash::make($request->password),
        ]);
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            "massage" => "successfully",
            "users" => new UserResource($user),
            "token" => $token,
        ], 200);
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        if (!$user->delete()) {
            return response()->json([
                "status"=> "Error",
                "message" => "کاربر پیدا نشد"
            ], 404);
        }
        $user->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'Course deleted successfully'
        ], 200);
    }
}
