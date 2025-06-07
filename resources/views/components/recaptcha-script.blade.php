<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: '{{ $action ?? 'submit' }}'}).then(function (token) {
            let tokenInput = document.getElementById('recaptcha_token');
            if (tokenInput) {
                tokenInput.value = token;
            } else {
                tokenInput = document.createElement('input');
                tokenInput.setAttribute('type', 'hidden');
                tokenInput.setAttribute('name', 'recaptcha_token');
                tokenInput.setAttribute('id', 'recaptcha_token');
                tokenInput.setAttribute('value', token);
                document.querySelector('form').appendChild(tokenInput);
            }
        });
    });
</script>
