<?php

namespace App\Http\Controllers\API;

use App\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserRole as UserRoleResource;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserRoleResource::collection(UserRole::paginate());
    }


    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UserRoleResource(UserRole::findOrFail($id));
    }
}
