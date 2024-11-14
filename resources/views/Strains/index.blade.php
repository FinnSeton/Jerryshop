<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1>Hier staan alle strains</h1>

<ul>
    @foreach($strains as $strain)
        <li>{{$strain->naam}} - {{$strain->merk}}</li>
    @endforeach

</ul>




</body>
</html>
