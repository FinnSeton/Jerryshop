@extends('layouts.blueprint')

@push('styles')

@endpush

@section('title')
    Strains
@endsection

@section('content')
<h1>Hier staan alle strains</h1>


    @foreach($strains as $strain)
        {{$strain->naam}} - {{$strain->merk}}
    @endforeach
@endsection

