@php
$setting = \App\Models\Settings::findorfail('1');
@endphp



@if($setting->logo)
    <img
        src="{{ asset('storage/' . $setting->logo) }}"
        alt="Logo"
        class="object-cover" width="150px;">
@else
    <h1 class="mb-4 text-4xl font-bold tracking-tight text-heading md:text-5xl lg:text-6xl" style="font-size: 2rem;">{{$setting->title}}
    </h1>
@endif
