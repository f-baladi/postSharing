@component('mail::message')
# خوش آمدگویی

سلام {{$user->name}} عزیز به جمع ما خوش آمدی.

@component('mail::button', ['url' => route('login')])
لینک ورود
@endcomponent

<br>
{{--{{ config('app.name') }}--}}
@endcomponent
