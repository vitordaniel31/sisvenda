<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        $users = collect($users)->map(function ($user) {
            $user['roles'] = implode(', ', $user->getRoleNames()->toArray());
            $user['can_update'] = auth()->user()->can('update', $user);
            $user['can_delete'] = auth()->user()->can('delete', $user);
            return $user;
        }, $users);

        return Inertia::render('Users/Index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create(array_merge($request->except('roles', 'password'), [
            'password' => Hash::make($request->password),
        ]));

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O usuário foi criado com sucesso.'
        ]);

        return Redirect::route('users.show', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user['can_update'] = auth()->user()->can('update', $user);
        $user['can_delete'] = auth()->user()->can('delete', $user);

        return Inertia::render('Users/Show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->except(['roles', 'password']));

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O usuário foi atualizado com sucesso.'
        ]);

        return Redirect::route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O usuário foi deletado com sucesso.',
        ]);

        return Redirect::route('users.index');
    }
}
