<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;



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
        $token = request()->get('g-recaptcha-response');
        $score = RecaptchaV3::verify($token, 'register');

        if ($score > 0.7) {
            // go — proceed with your existing validation & user creation
        } elseif ($score > 0.3) {
            $this->addError('recaptcha', 'Captcha score is medium — require additional verification.');
            return;
        } else {
            $this->addError('recaptcha', 'You are most likely a bot.');
            return;
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
