<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soaga | Editor</title>
</head>
<body>
    <h1>SOAGA | Edición</h1>
    {{ $institution }}

    <form method="POST" action="{{ route('institution.update') }}">
        @csrf

        <p>
            <label for="">Codigo DANE</label>
            <input type="text" name="codigo_dane" value="{{ $institution->codigo_dane }}" required>
        </p>

        <p>
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{ $institution->nombre }}" required>
        </p>
        
        <p>
            <label for="">Dirección</label>
            <input type="text" name="direccion" value="{{ $institution->direccion }}" required>
        </p>
        
        <p>
            <label for="">Telefono</label>
            <input type="number" name="telefono" value="{{ $institution->telefono }}" required>
        </p>
        
        <p>
            <label for="">Correo</label>
            <input type="email" name="correo" value="{{ $institution->correo }}" required>
        </p>

        <p>
            <label for="">WEB</label>
            <input type="text" name="web" value="{{ $institution->web }}" required>
        </p>
        

        <input type="submit" value="Actualizar">
    </form>

    <br><br><br><a href="{{ route('institution.delete', ['id'=>$institution->id]) }}">Borrar institucion</a>
</body>
</html>