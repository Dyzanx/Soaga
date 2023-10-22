@include('layouts.header')

<!-- {{ Session::get('user') }} -->

<h2>Inciar sesión como Estudiante</h2>

<form action="{{ route('user.login') }}" method="post">
    @csrf

    <p>
        <label for="tipo_doc">Tipo Documento</label><br>
        <select name="tipo_doc" required>
            <option value="cc">Cedula ciudadanía</option>
            <option value="ti">Tarjeta identidad</option>
            <option value="ce">Cedula extranjeria</option>
            <option value="pas">Pasaporte</option>
            <option value="pep">P.E.P</option>
        </select>
    </p>
    <p>
        <label for="num_doc">Numero Documento</label><br>
        <input type="number" name="num_doc" required>
    </p>
    <p>
        <label for="correo">Correo</label><br>
        <input type="email" name="correo" required>
    </p>
    <p>
        <label for="contra">Contraseña</label><br>
        <input type="password" name="contra" required>
    </p>
    <p>
        <input type="submit" value="Iniciar Sesión">
    </p>
</form>

@include('layouts.footer')