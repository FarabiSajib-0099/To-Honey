@component('mail::message')
#Change Password Confrimation {{$user_name_for_mail}}



@component('mail::panel')
Your password has been changed!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent