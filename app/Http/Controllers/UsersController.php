<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    use PasswordValidationRules;

    public function index(UsersDataTable $dataTable)
    {
        $users = User::all();
        // return $dataTable->render('users.index');
        return view('users.list', ['users'=>$users]);
    }

    public function store(Request $request)
    {        
        $input = $request->all();

        try {
            Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'email'=>[
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }
        
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
}
