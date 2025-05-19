<?php

namespace App\Actions\Fortify;

use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {
        if($input['type'] == 'client') {
            Validator::make($input, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(Client::class),
                ],
                'password' => 'required|min:8|same:confirm_password',
                'confirm_password' => 'required|min:8|same:password',
                'company_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'avatar' => ['nullable', 'image'],
            ])->validate();

            if ($input['avatar']) {
                $input['avatar'] = $input['avatar']->store('avatars', 'public');
            }else{
                $input['avatar'] = null;
            }
            return Client::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'company_name' => $input['company_name'],
                'phone' => $input['phone'],
                'avatar' => $input['avatar'],
            ]);
        }
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => 'required|min:8',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
