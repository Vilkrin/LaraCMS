<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        // Validator::make(request()->all(), [
        //     'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
        // ])->validate();

        try {
            Validator::make(request()->all(), [
                'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
            ])->validate();
        } catch (ValidationException $e) {
            $this->addError('recaptcha', 'Captcha verification failed.');
            return; // stop execution
        }

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        // Assign the 'user' role after the user is created
        $user->assignRole('user');

        Auth::login($user);

        $this->redirect(route('home', absolute: false), navigate: true);
    }
}
