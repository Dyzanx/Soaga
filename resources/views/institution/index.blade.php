@include('layouts.header')

<!-- {{ $institution }} -->

<h2>Gestiona tu institución</h2>

<div class="modules">
    <div class="modulo modulo-profesores">
        <a href="{{ route('teacher.index') }}">
            <span>
                <i class="bi bi-person-circle"></i>
                profesores
            </span>
        </a>
    </div>
    <div class="modulo modulo-grupo">
        <a href="{{ route('group.index') }}">
            <span>
                <i class="bi bi-people-fill"></i>
                Grupos
            </span>
        </a>
    </div>
    <div class="modulo modulo-salones">
        <a href="{{ route('classroom.index') }}">
            <span>
                <i class="bi bi-easel"></i>
                Salones
            </span>
        </a>
    </div>
    <div class="modulo modulo-implementos">
        <a href="#" class="popup-trigger" data-popup-trigger="three">
            <span>
                <i class="bi bi-card-checklist"></i>
                Implementos
            </span>
        </a>
    </div>
</div>

<div class="popup-modal shadow" data-popup-modal="three">
    <i class="fas fa-2x fa-times text-white bg-primary p-3 popup-modal__close"></i>
    <h2>selecciona el salon</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Capacidad</th>
            <th>Ver implementos</th>
        </tr>
        @foreach($classrooms as $class)
        <tr>
            <td>{{ $class->id }}</td>
            <td>{{ $class->capacidad }}</td>
            <td>
                <a href="{{ route('implements.index', ['id' => $class->id]) }}" style="margin: 0px auto;" class="login-button">Administrar</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<div class="modules">
    <div class="modulo modulo-x">
        <a href="{{ route('institution.logout') }}">
            <span>
                <i class="bi bi-power"></i>
                Cerrar sesión
            </span>
        </a>
    </div>
</div>

@include('layouts.footer')