@include('layouts.header')

<h2>Registrate como Estudiante</h2>

<form action="{{ route('user.save') }}" method="post">
    @csrf

    <p>
        <label for="codigo">Codigo Dane Institución</label><br>
        <input type="text" name="codigo" required>
    </p>
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
        <label for="nombre"></label>Nombre<br>
        <input type="text" name="nombre" required>
    </p>
    <p>
        <label for="f_naci"></label>Fecha de nacimiento<br>
        <input type="date" name="f_naci" required>
    </p>
    <p>
        <label for="celular">Celular</label><br>
        <input type="number" name="celular" required>
    </p>
    <p>
        <label for="eps">EPS</label><br>
        <input type="text" name="eps" required>
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
        <input type="submit" value="Registrarse">
    </p>
</form>

@include('layouts.footer')