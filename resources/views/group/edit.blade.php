@include('layouts.header')

<h2>Editar grupo | {{ $group->codigo }}</h2>

<form method="POST" action="{{ route('group.update') }}">
    @csrf

    <p>
        <label for="codigo">Codigo del grupo</label><br>
        <input type="text" name="codigo" value="{{ $group->codigo  }}" required>
    </p>

    <p>
        <label for="num_doc_profesor">N° documento profesor</label><br>
        <input type="number" name="num_doc_profesor" value="{{ $teacher->num_doc }}" required>
    </p>

    <p>
        <label for="comentario">Observación</label><br>
        <input type="text" name="comentario" value="{{ $group->comentario }}" required>
    </p>

    <input type="hidden" name="group_id" value="{{ $group->id }}">

    <input type="submit" value="Actualizar">
</form>

@include('layouts.footer')