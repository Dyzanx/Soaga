@include('layouts.header')

<h2>Agrega un nuevo grupo</h2>

<form method="POST" action="{{ route('group.save') }}">
    @csrf

    <p>
        <label for="codigo">Codigo del grupo</label><br>
        <input type="text" name="codigo" required>
    </p>

    <p>
        <label for="num_doc_profesor">N° documento profesor</label><br>
        <input type="number" name="num_doc_profesor" required>
    </p>

    <p>
        <label for="comentario">Observación</label><br>
        <input type="text" name="comentario" required>
    </p>

    <input type="submit" value="Enviar">
</form>

@include('layouts.footer')