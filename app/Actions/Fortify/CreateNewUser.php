<?php

namespace App\Actions\Fortify;

use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $role_as = $input['role_as'] == 'SP' ? 'SP' : 'CST';

        $users = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'role_as' => $role_as,
        ]);

        if ($role_as == 'SP') {
            ServiceProvider::create([
                'user_id'=>$users->id,
            ]);
        }
        session()->put('auth_id', $users['id']);
        session()->put('auth_name', $users['name']);
        session()->put('auth_email', $users['email']);
        session()->put('auth_role', $users['role_as']);
        
        return $users;
        
    }
}
