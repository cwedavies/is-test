<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::with('role')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'bail|required|max:255|unique:users',
            'email' => 'bail|required|email|max:255|unique:users',
            'user_role' => 'bail|required|integer|exists:user_roles,id'
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->user_roles_id = $request->user_role;
        $user->save();

        return new UserResource($user->load('role'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user->load('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => [
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'user_role' => 'integer|exists:user_roles,id'
        ]);

        $user->update(array_filter([
            'username' => $request->username,
            'email' => $request->email,
            'user_roles_id' => $request->user_role
        ]));

        return new UserResource($user->with('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
