@component('mail::message')
# Introduction

پست زیر با موفقیت حذف شد
عنوان: {{$post->title}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
