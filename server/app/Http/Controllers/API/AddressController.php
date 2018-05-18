<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\User;
use App\Http\Resources\Address as AddressResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $data = $request->validate([
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255'
        ]);

        $address = $user->addresses()->create($data);

        return new AddressResource($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id, Address $address)
    {
        $data = $request->validate([
            'address' => 'string|max:255',
            'province' => 'string|max:255',
            'city' => 'string|max:255',
            'country' => 'string|max:255',
            'postal_code' => 'string|max:255'
        ]);

        $address->update($data);

        return new AddressResource($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, Address $address)
    {
        $address->delete();
        return response()->json(null, 204);
    }
}
