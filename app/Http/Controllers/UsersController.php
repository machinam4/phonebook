<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Channels;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    use PasswordValidationRules;

    public function index()
    {
        $users = User::all();
        $channels = Channels::all();
        // return $dataTable->render('users.index');
        return view('users.index', ['users' => $users, 'channels' => $channels]);
    }
    function create()
    {
        $channels = Channels::all();
        return view('users.add', ['channels' => $channels]);
    }
    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255', Rule::unique(User::class),],
            'role' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        User::create([
            'name' => $input['name'],
            'phone_number' => $input['phone_number'],
            'email' => $input['email'],
            'role' => $input['role'],
            'status' => $input['status'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
        ]);
        // return $dataTable->render('users.index');
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    function edit(User $user)
    {
        $channels = Channels::all();
        return view('users.update', ['channels' => $channels, 'user' => $user]);
    }
    function update(Request $request, User $user)
    {
        $input = $request->all();
        Validator::make($input, [
            'phone_number' => ['required', 'string', 'max:255', Rule::unique(User::class),],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
        ])->validate();
        $user->update($input);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
