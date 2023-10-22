@include('layouts.header')

<h2>Agrega un nuevo salón</h2>

<form method="POST" action="{{ route('classroom.save') }}">
    @csrf

    <p>
        <label for="comentario">Observación</label><br>
        <input type="text" name="comentario" required>
    </p>

    <p>
        <label for="capacidad">Capacidad de personas</label><br>
        <input type="number" name="capacidad" required>
    </p>

    <input type="submit" value="Guardar">
</form>

@include('layouts.footer')