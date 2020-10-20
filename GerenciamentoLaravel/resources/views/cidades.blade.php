<!DOCTYPE html>
<html>
<head>
    <title>Cidades</title>
</head>
<body>
<h1>Cidades</h1>
<ul>
    @foreach($cidades as $cidade)
        <li>{{$cidade->nome}}</li>
        <li>{{$cidade->siglaEstado}}</li>
        <li>{{$cidade->cep}}</li>
    @endforeach
</ul>
</body>
</html>
