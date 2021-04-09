@component('mail::message')
# Reset Password

Hello {{$receiver->name}},
Please click the button below to reset your password.

@component('mail::button', ['url' => $resetUrl])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
