<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="straininpbox">
        <form action='/Strains/store' method='POST'>
            @csrf
            <label for='name'>Vul strain naam in</label>
            <input type='text' name='strainnaam'>
                @error('strainnaam')
                    <p>Er is een error in de songs: {{$errors}}</p>
                @enderror
            <input type='submit'>
        </form>
    </div>
</x-app-layout>
