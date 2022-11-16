<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Route::is('myProfile'))
                {{ __('My profile')  }}
            @else
                {{ $user->username . __('\'s profile') }}
            @endif
        </h2>
    </x-slot>
</x-app-layout>
