@include('layouts.header')

<h2>Formulario de reserva</h2>

<form method="POST" action="{{ route('classroom.saveReserva') }}">
    @csrf

    <p>
        <label for="fecha">Fecha</label><br>
        <input type="date" name="fecha" required>
    </p>

    <p>
        <label for="hora_inicio">Hora inicio</label><br>
        <input type="time" name="hora_inicio" required>
    </p>

    <p>
        <label for="hora_fin">Hora fin</label><br>
        <input type="time" name="hora_fin" required>
    </p>

    <p>
        <label for="grupo">ID Grupo</label><br>
        <input type="text" name="grupo" required>
    </p>

    <input type="hidden" name="id" value="{{ $class->id }}">

    <input type="submit" value="Agendar">
</form>

@include('layouts.footer')