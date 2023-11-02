<?php

namespace App\Http\Controllers\Api;

// import Model "User"
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// import Resource "UserResource"
use App\Http\Resources\UserResource;

// import Facade "Validator"
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // get all users
        $users = User::latest()->paginate(5);

        // return collection of users as a resource
        return new UserResource(true, 'List Data User', $users);
    }

    public function store(Request $request)
    {
        // create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'instagram' => $request->instagram,
        ]);

        // return response
        return new UserResource(true, 'Data User Berhasil Ditambahkan!', $user);
    }
}
