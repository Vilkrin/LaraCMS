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
        // Validator::make(request()->all(), [
        //     'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
        // ])->validate();

        // try {
        //     Validator::make(request()->all(), [
        //         'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
        //     ])->validate();
        // } catch (ValidationException $e) {
        //     $this->addError('recaptcha', 'Captcha verification failed.');
        //     return; // stop execution
        // }

        $token = request('g-recaptcha-response');

        // Log the token for debugging
        \Log::info('Recaptcha token received', [
            'token' => $token
        ]);

        if (!$token) {
            $this->addError('recaptcha', 'No token received. Check if the field is inside the form and JS is running.');
            return;
        }

        // Verify the token and log the score
        try {
            $score = RecaptchaV3::verify($token, 'register');

            \Log::info('Recaptcha verification score', [
                'score' => $score
            ]);
        } catch (\Exception $e) {
            \Log::error('Recaptcha verification error', [
                'message' => $e->getMessage()
            ]);
            $this->addError('recaptcha', 'Recaptcha verification failed. Check secret key and domain.');
            return;
        }

        // Optional: handle score thresholds
        if ($score < 0.3) {
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
