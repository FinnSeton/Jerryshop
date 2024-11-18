<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="straininpbox">
        <form action='/strains/store' method='POST'>
            @csrf
            <label for='naam'>Vul strain naam in</label>
            <input type='text' name='naam'>
                @error('naam')
                    <p>Er is een error in de strains: {{$errors}}</p>
                @enderror

            <label for="merk">Vul het merk in van de zaza</label>
            <input type="text" name="merk">
                @error('merk')
                    <p>Er is een error in de merken.</p>
                @enderror

            <label for="soort">Vul de soort in (Sativa / Indica / Hybrid)</label>
            <input type="text" name="soort">
                @error('soort')
                    <p>Er is een error in alles.</p>
                @enderror

            <label for="thc">Vul het THC-gehalte van die kk wietje in</label>
            <input type="text" name="thc">
                @error('thc')
                    <p>Er is een error in alles.</p>
                @enderror

            <label for="cbd">Vul het CBD-gehalte van die kk wietje in</label>
            <input type="text" name="cbd">
                @error('cbd')
                    <p>Er is een error in alles.</p>
                @enderror

            <label for="prijs">Vul de prijs in.</label>
            <input type="text" name="prijs">
                @error('prijs')
                    <p>Er is een error in alles.</p>
                @enderror
            <input type='submit'>
        </form>
    </div>
</x-app-layout>
