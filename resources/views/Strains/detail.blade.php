@extends('layouts.productblueprint')

@push('styles')

@endpush



@if($foundstrain)
    @section('strainname')
        {{$foundstrain->naam}}
    @endsection

    @section('brand')
        {{$foundstrain->merk}}
    @endsection

    @section('type')
        {{$foundstrain->soort}}
    @endsection

    @section('price')
        {{$foundstrain->prijs}}
    @endsection

    @section('thc')
        {{$foundstrain->thc}}
    @endsection

    @section('cbd')
        {{$foundstrain->cbd}}
    @endsection

@endif