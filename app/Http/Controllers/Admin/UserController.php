<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateUserAction;
use App\Actions\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showUser(User $user)
    {

        return view('admin.users.show', compact('user'));
    }

    public function editUser(Request $request, User $user, UpdateUserAction $action)
    {
        $data = $request->validate([

            'login' => 'string',
            'password' => 'string',
            'status' => '',
            'isAdmin' => '',

        ]);

        return $action($user, $data);
    }

    public function createUser(Request $request, CreateUserAction $action)
    {
        $data = $request->validate([

            'login' => 'string',
            'password' => 'string',
            'status' => '',
            'isAdmin' => '',

        ]);

        return $action($data);
    }
}
