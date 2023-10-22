@include('layouts.header')

    <h2>Inicio de Sesión como Institución</h2>

    <form method="get" action="{{ route('institution.login') }}">
        @csrf

        <p>
            <label for="correo">Correo</label>
            <input type="email" name="correo" required>
        </p>
        <p>
            <label for="contra">Contraseña</label>
            <input type="password" name="contra" autocomplete="off">
        </p>

        <input type="submit" value="Entrar">
    </form>

@include('layouts.footer')