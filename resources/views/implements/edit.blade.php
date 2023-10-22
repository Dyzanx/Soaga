@include('layouts.header')

<h2>Edición del implemento</h2>

<form method="POST" action="{{ route('implements.update') }}">
    @csrf

    <p>
        <label for="nombre">titulo</label><br>
        <input type="text" name="nombre" value="{{ $implement->nombre }}" required>
    </p>

    <p>
        <label for="comentario">Comentario</label><br>
        <input type="text" name="comentario" value="{{ $implement->comentario }}" required>
    </p>

    <input type="hidden" name="id" value="{{ $implement->id }}">

    <input type="submit" value="Guardar cambios">
</form>

@include('layouts.footer')