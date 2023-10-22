@include('layouts.header')

<h2>Edición de aula</h2>

<form method="POST" action="{{ route('classroom.update') }}">
    @csrf

    <p>
        <label for="comentario">Observación</label><br>
        <input type="text" name="comentario" value="{{ $class->comentario }}" required>
    </p>

    <p>
        <label for="capacidad">Capacidad de personas</label><br>
        <input type="number" name="capacidad" value="{{ $class->capacidad }}" required>
    </p>

    <input type="hidden" name="id" value="{{ $class->id }}">

    <input type="submit" value="Actualizar">
</form>

@include('layouts.footer')