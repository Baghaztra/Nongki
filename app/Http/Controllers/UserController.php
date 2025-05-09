<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.users.index");
    }

    public function getAllData()
    {
        $data = User::latest()->get();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Add user.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'status' => 200,
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|' . Rule::unique('users')->ignore($user)
        ];
        $data = [];

        if (!empty($request->password)) {
            $rules['password'] = 'min:1';
            $data['password'] = bcrypt($request->password);
        }
        $request->validate($rules);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $user->update($data);
        return response()->json([
            'status' => 200,
            'message' => 'Successfully update user.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }
        if (auth()->user()->id == $user->id) {
            return response()->json([
                'status' => 204,
                'message' => 'Cannot remove your account.'
            ]);
        }
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully delete user.'
        ]);
    }
}