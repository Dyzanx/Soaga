@include('layouts.header')

<h2>Registro de Institución</h2>

<form method="POST" action="{{ route('institution.save') }}">
    @csrf

    <p>
        <label for="codigo_dane">Codigo DANE</label><br>
        <input type="text" name="codigo_dane" required>
    </p>

    <p>
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" required>
    </p>

    <p>
        <label for="direccion">Dirección</label><br>
        <input type="text" name="direccion" required>
    </p>

    <p>
        <label for="telefono">Telefono</label><br>
        <input type="number" name="telefono" required>
    </p>

    <p>
        <label for="correo">Correo</label><br>
        <input type="email" name="correo" required>
    </p>

    <p>
        <label for="contra">Contraseña</label><br>
        <input type="password" name="contra" autocomplete="off" required>
    </p>

    <p>
        <label for="web">WEB</label><br>
        <input type="text" name="web" required>
    </p>


    <input type="submit" value="Registrarse">
</form>

@include('layouts.footer')