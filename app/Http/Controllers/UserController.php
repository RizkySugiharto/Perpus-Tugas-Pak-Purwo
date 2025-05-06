<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User($request->validated());
        if ($user->save()) {
            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.add');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->validated('name');
        $user->email = $request->validated('email');
        if ($request->validated('password')) {
            $user->password = Hash::make($request->validated('password'));
        }

        if ($user->save()) {
            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.edit', ['user' => $user]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');
    }
}
