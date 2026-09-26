<?php
<<<<<<< HEAD
namespace App\Actions\Fortify;
=======

namespace App\Actions\Fortify;

>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

<<<<<<< HEAD
class CreateNewUser implements CreatesNewUsers {
    use PasswordValidationRules;
    public function create(array $input): User {
        Validator::make($input, [
            'name'=>['required','string','max:255'],
            'email'=>['required','string','email','max:255','unique:users'],
            'academic_year'=>['nullable','string','max:100'],
            'monthly_allowance'=>['nullable','numeric','min:0'],
            'saving_goal'=>['nullable','numeric','min:0'],
            'password'=>$this->passwordRules(),
            'terms'=>Jetstream::hasTermsAndPrivacyPolicyFeature()?['accepted','required']:'',
        ])->validate();
        return User::create([
            'name'=>$input['name'],'email'=>$input['email'],
            'academic_year'=>$input['academic_year']??null,
            'monthly_allowance'=>$input['monthly_allowance']??0,
            'saving_goal'=>$input['saving_goal']??0,
            'password'=>Hash::make($input['password']),
        ]);
    }
}
=======
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
