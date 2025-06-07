<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    protected float $threshold;

    public function __construct(float $threshold = 0.5)
    {
        $this->threshold = $threshold;
    }

    public function passes($attribute, $value): bool
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret_key'),
            'response' => $value,
            'remoteip' => request()->ip(),
        ]);

        $data = $response->json();

        return ($data['success'] ?? false) && ($data['score'] ?? 0) >= $this->threshold;
    }

    public function message(): string
    {
        return 'reCAPTCHA verification failed. Please try again.';
    }
}
