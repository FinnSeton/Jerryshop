@extends('layouts.dashboardblueprint')

@push('styles')

@endpush

@section('title')
    Create Strains
@endsection

@section('content')

    <div class="container rounded mx-auto w-5/6 m-5 bg-gray-800 p-2 straininpbox">
        <form class="flex flex-col " action='/strains/store' method='POST'>
            @csrf
            <label class="text-white" for='naam'>Vul strain naam in</label>
            <input type='text' name='naam'>
                @error('naam')
                    <p class="text-red">Er is een error in de strains: {{$errors}}</p>
                @enderror

            <label class="text-white" for="merk">Vul het merk in van de zaza</label>
            <input type="text" name="merk">
                @error('merk')
                    <p class="text-red">Er is een error in de merken.</p>
                @enderror

            <label class="text-white" for="soort">Vul de soort in (Sativa / Indica / Hybrid)</label>
            <input type="text" name="soort">
                @error('soort')
                    <p class="text-red">Ongeldige invoer.</p>
                @enderror

            <label class="text-white" for="thc">Vul het THC-gehalte van de wiet in</label>
            <input type="text" name="thc">
                @error('thc')
                    <p class="text-red">Ongeldige invoer.</p>
                @enderror

            <label class="text-white" for="cbd">Vul het CBD-gehalte van de wiet in</label>
            <input type="text" name="cbd">
                @error('cbd')
                    <p class="text-red">Ongeldige invoer voor Cbd.</p>
                @enderror

            <label class="text-white" for="prijs">Vul de prijs in.</label>
            <input type="text" name="prijs">
                @error('prijs')
                    <p class="text-red">Ongeldige invoer.</p>
                @enderror
            <input class="mt-5 text-white border-2 rounded border-white hover:border-black hover:bg-white hover:text-black hover:cursor-pointer" type='submit'>
        </form>
    </div>
@endsection
