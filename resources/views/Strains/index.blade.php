@extends('layouts.dashboardblueprint')

@push('styles')
    <style>
        .joint-form {
            display: none;
        }
        .edit-strain-form {
            display: none;
        }
        .edit-joint-form{
            display: none;
        }

    </style>
@endpush

@section('title')
    Hier staan alle Strains
@endsection

@section('content')
    <div class="container rounded mx-auto w-1/2 sm  bg-gray-800 text-white">
        <div class="p-2">
            @foreach($strains as $strain)
                <div class="p-2 mb-2 bg-gray-600 strain">
                    <p class="font-bold">{{$strain->naam}} - {{$strain->merk}} - {{$strain->soort}} - {{$strain->thc}}% THC - {{$strain->cbd}}% CBD - €{{$strain->prijs}}</p>

                    <div class="buttoncontainer flex">
                        <form method="POST" action="/strains/delete/{{$strain->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border pr-2 pl-2 mr-2 rounded border-red-500">Delete</button>
                        </form>

                        <button id="make-joint-button-{{$strain->id}}" class="border pr-2 pl-2 mr-2 rounded border-green-500"
                            onclick="toggleJointForm({{$strain->id}})">
                            Make Joint
                        </button>



                        <button id="edit-strain-button-{{$strain->id}}" class="border pr-2 pl-2 rounded border-blue-500"
                            onclick="toggleEditForm({{$strain->id}})">
                            Edit Strain
                        </button>
                    </div>

                    <div id="edit-strain-form-{{$strain->id}}" class="edit-strain-form mt-3">
                        <form class="mt-5 flex flex-col container mx-auto sm" action="/strain/edit/{{$strain->id}}" method="POST">
                            @csrf
                            @method('PUT')

                            <label for="naam" class="text-white">Strain Name</label>
                            <input type="text" class="text-black" name="naam" value="{{ $strain->naam }}" required>

                            <label for="merk" class="text-white">Brand</label>
                            <input type="text" class="text-black" name="merk" value="{{ $strain->merk }}" required>

                            <label for="soort" class="text-white">Type</label>
                            <input type="text" class="text-black" name="soort" value="{{ $strain->soort }}" required>

                            <label for="thc" class="text-white">THC %</label>
                            <input type="number" class="text-black" name="thc" value="{{ $strain->thc }}" min="0" required>

                            <label for="cbd" class="text-white">CBD %</label>
                            <input type="number" class="text-black" name="cbd" value="{{ $strain->cbd }}" min="0" required>

                            <label for="prijs" class="text-white">Price (€)</label>
                            <input type="number" class="text-black" name="prijs" value="{{ $strain->prijs }}" min="0" required>

                            <button type="submit" class="mt-5 text-white border-2 rounded border-white hover:border-black hover:bg-white hover:text-black">Update Strain</button>
                        </form>
                    </div>

                    <div id="joint-form-{{$strain->id}}" class="joint-form mt-3">
                        <form class="mt-5 flex flex-col container mx-auto sm" action='/joints/store' method='POST'>
                            @csrf
                            <input type='hidden' name='strain_id' value="{{$strain->id}}" readonly>

                            <label class="text-white" for="prijs">Vul het prijs in van de zaza</label>
                            <input type="text" class="text-black" name="prijs">

                            <input class="mt-5 text-white border-2 rounded border-white hover:border-black hover:bg-white hover:text-black" type='submit'>
                        </form>
                    </div>
                </div>

                @foreach($strain->joints as $joint)
                    <div class="p-2 mb-2 bg-gray-600 joint">
                        <p class="font-bold">{{$strain->naam}} Joint - €{{$joint->prijs}}</p>

                        <div class="buttoncontainer flex">
                            <form method="POST" action="/joints/delete/{{$joint->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border pr-2 pl-2 rounded border-red-500">Delete</button>
                            </form>
                            <button id="edit-joint-button-{{$joint->id}}" class="border pr-2 pl-2 rounded border-blue-500"
                                    onclick="toggleEditJointForm({{$joint->id}})">
                                Edit Joint
                            </button>
                        </div>
                        <div id="edit-joint-form-{{$joint->id}}" class="edit-joint-form mt-3">
                            <form class="mt-5 flex flex-col container mx-auto sm" action="/joint/update/{{$joint->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="prijs" class="text-white">Price (€)</label>
                                <input type="number" class="text-black" name="prijs" value="{{ $joint->prijs }}" min="0" required>

                                <button type="submit" class="mt-5 text-white border-2 rounded border-white hover:border-black hover:bg-white hover:text-black">Update Joint</button>
                            </form>
                        </div>

                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleJointForm(strainId) {
            var form = document.getElementById('joint-form-' + strainId);
            var button = document.getElementById('make-joint-button-' + strainId);

            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                button.innerText = 'Hide Joint';
            } else {
                form.style.display = 'none';
                button.innerText = 'Make Joint';
            }
        }

        function toggleEditForm(strainId) {
            var form = document.getElementById('edit-strain-form-' + strainId);
            var button = document.getElementById('edit-strain-button-' + strainId);

            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                button.innerText = 'Hide Strains';
            } else {
                form.style.display = 'none';
                button.innerText = 'Edit Strain';
            }
        }

        function toggleEditJointForm(jointId) {
            var form = document.getElementById('edit-joint-form-' + jointId);
            var button = document.getElementById('edit-joint-button-' + jointId);

            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                button.innerText = 'Hide Joints';
            } else {
                form.style.display = 'none';
                button.innerText = 'Edit Joint';
            }
        }
    </script>
@endpush
