@include('layouts.header')

<h2>Agregar un nuevo implemento</h2>

<form method="POST" action="{{ route('implements.save') }}">
    @csrf

    <p>
        <label for="nombre">titulo</label><br>
        <input type="text" name="nombre" required>
    </p>

    <p>
        <label for="comentario">Comentario</label><br>
        <input type="text" name="comentario" required>
    </p>

    <input type="hidden" name="id" value="{{ $id }}">

    <input type="submit" value="Guardar">
</form>

@include('layouts.footer')