@include('layouts.header')

<h2>Esitar información de usuario</h2>

<form method="POST" action="{{ route('user.update') }}">
    @csrf

    <p>
        <label for="tipo_doc">Tipo Documento</label><br>
        <select name="tipo_doc" required>
            <option value="cc" @if($user->tipo_doc == 'cc') {{'selected'}} @endif >Cedula ciudadanía</option>
            <option value="ti" @if($user->tipo_doc == 'ti') {{'selected'}} @endif >Tarjeta identidad</option>
            <option value="ce" @if($user->tipo_doc == 'ce') {{'selected'}} @endif >Cedula extranjeria</option>
            <option value="pas" @if($user->tipo_doc == 'pas') {{'selected'}} @endif >Pasaporte</option>
            <option value="pep" @if($user->tipo_doc == 'pep') {{'selected'}} @endif >P.E.P</option>
        </select>
    </p>
    <p>
        <label for="num_doc">Numero Documento</label><br>
        <input type="number" name="num_doc" value="{{ $user->num_doc }}" required>
    </p>
    <p>
        <label for="nombre"></label>Nombre<br>
        <input type="text" name="nombre" value="{{ $user->nombre }}" required>
    </p>
    <p>
        <label for="f_naci"></label>Fecha de nacimiento<br>
        <input type="date" name="f_naci" value="{{ $user->f_naci }}" required>
    </p>
    <p>
        <label for="celular">Celular</label><br>
        <input type="number" name="celular" value="{{ $user->celular }}" required>
    </p>
    <p>
        <label for="eps">EPS</label><br>
        <input type="text" name="eps" value="{{ $user->eps }}" required>
    </p>
    <p>
        <label for="correo">Correo</label><br>
        <input type="email" name="correo" value="{{ $user->correo }}" required>
    </p>
    <input type="hidden" name="id" value="{{ $user->id }}">
    <p>
        <input type="submit" value="Actualizar">
    </p>
</form>

@include('layouts.footer')