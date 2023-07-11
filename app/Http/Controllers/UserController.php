<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

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
        if (Cache::has('users')) {
            session()->flash('alert', [
                'type' => 'warn',
                'message' => 'Essa consulta usou o Cache do Redis.'
            ]);

            $users = Cache::get('users');
        } else {
            session()->flash('alert', [
                'type' => 'error',
                'message' => 'Essa consulta não usou o Cache do Redis.'
            ]);

            $users = User::all();

            Cache::put('users', $users, 60);
        }

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
        $roles = Role::all();

        return Inertia::render('Users/Create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create(array_merge($request->except('role_id', 'password'), [
            'password' => Hash::make($request->password),
        ]));

        $user->syncRoles($request->role_id);

        Cache::forget('users');

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

        $roles = Role::all();

        return Inertia::render('Users/Show', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return Inertia::render('Users/Edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->except(['role_id', 'password']));

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        $user->syncRoles($request->role_id);

        Cache::forget('users');

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

        Cache::forget('users');

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O usuário foi deletado com sucesso.',
        ]);

        return Redirect::route('users.index');
    }
}
