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
        return UserResource::collection(User::with('role', 'addresses')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'bail|required|max:255|unique:users',
            'email' => 'bail|required|email|max:255|unique:users',
            'user_roles_id' => 'bail|required|integer|exists:user_roles,id',
            'addresses.*.address' => 'bail|required|string|max:255',
            'addresses.*.province' => 'bail|required|string|max:255',
            'addresses.*.city' => 'bail|required|string|max:255',
            'addresses.*.country' => 'bail|required|string|max:255',
            'addresses.*.postal_code' => 'bail|required|string|max:255',
        ]);

        $user = User::create($data);
        if (array_key_exists('addresses', $data)) {
            $user->addresses()->createMany($data['addresses']);
        }

        return new UserResource($user->load('role', 'addresses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user->load('role', 'addresses'));
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
        $data = $request->validate([
            'username' => [
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'user_roles_id' => 'integer|exists:user_roles,id'
        ]);

        $user->update($data);

        return new UserResource($user->load('role', 'addresses'));
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
