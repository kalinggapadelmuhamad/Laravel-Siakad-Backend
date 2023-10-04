<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu = 'user';
        $keyword = $request->input('name');
        $users = User::when($request->input('name'), function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);

        $users->appends(['name' => $keyword]);

        return view('pages.user.index', compact('type_menu', 'users'));

    }

    /**
     * Display a form create user.
     */
    public function create()
    {
        $type_menu = 'user';
        return view('pages.user.create', compact('type_menu'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return Redirect::route('user.index')->with('success', 'New user has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Display a form edit user.
     */
    public function edit(User $user)
    {
        $type_menu = 'user';
        return view('pages.user.edit', compact('type_menu', 'user'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $type_menu = 'user';
        $validate = $request->validated();
        $user->update($validate);

        return Redirect::route('user.index')->with('success', 'User has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('user.index')->with('success', 'User has been successfully delete.');
    }
}
