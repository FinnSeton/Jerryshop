@extends('layouts.dashboardblueprint')

@push('styles')
    <style>
        .joint-form {
            display: none;
        }
    </style>
@endpush

@section('title')
Hier staan alle Strains
@endsection

@section('content')
    <div class="container rounded mx-auto w-1/2 sm bg-gray-800 text-white">
        <div class="m-1 p-0.5">
            @foreach($strains as $strain)
                <div class="p-2 mb-2 bg-gray-600 strain">
                    <p class="font-bold">{{$strain->naam}} - {{$strain->merk}} - {{$strain->soort}} - {{$strain->thc}}% THC -
                        {{$strain->cbd}}% CBD - €{{$strain->prijs}}
                    </p>

                    <div class="buttoncontainer flex" >
                        <form class="" method="POST" action="/strains/delete/{{$strain->id}}">
                            @csrf
                            @method('DELETE')
                            <button method="POST" action="/strains/delete/{{$strain->id}}" type="submit"
                                class="border pr-2 pl-2 rounded border-red-500">Delete</button>    
                        </form>


                        <button id="make-joint-button-{{$strain->id}}" class="border pr-2 pl-2 rounded border-green-500" onclick=" toggleJointForm({{$strain->id}})">
                            Make Joint
                        </button>

                    </div>

                    <div id="joint-form-{{$strain->id}}" class="joint-form mt-3">
                        <form class="mt-5 flex flex-col container mx-auto sm" action='/joints/store' method='POST'>
                            @csrf
                            <input type='hidden' class="text-black" name='strain_id' value="{{$strain->id}}" readonly>

                            <label class="text-white" for="prijs">Vul het prijs in van de zaza</label>
                            <input type="text" class="text-black" name="prijs">
                            
                            <input class="mt-5 text-white border-2 rounded border-white hover:border-black hover:bg-white hover:text-black" type='submit'>
                        </form>
                    </div>
                </div>

                @foreach($strain->joints as $joint)
                    <div class="p-2 mb-2 bg-gray-600 joint">
                        <p class="font-bold">{{$strain->naam}} Joint -  €{{$joint->prijs}}</p>
                        <form class="" method="POST" action="/joints/delete/{{$joint->id}}">
                            @csrf
                            @method('DELETE')
                            <button method="POST" action="/joints/delete/{{$joint->id}}" type="submit"
                                class="border pr-2 pl-2 rounded border-red-500">Delete</button>    
                        </form>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Toggle visibility of joint form
        function toggleJointForm(strainId) {
            var form = document.getElementById('joint-form-' + strainId);
            var button = document.getElementById('make-joint-button-' + strainId);

            // Toggle form visibility
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                button.innerText = 'Hide Joint Form'; // Change button text when form is shown
            } else {
                form.style.display = 'none';
                button.innerText = 'Make Joint'; // Change button text when form is hidden
            }
        }
    </script>
@endpush