@include('layouts.header')

@if(Session::get('teacher'))
    <h2>Modulo de administracion docente</h2>
@else
    <h2>Modulo de usuario</h2>
@endif

<div class="modules">
    @if(Session::get('teacher'))
        <div class="modulo modulo-profesores">
            <a href="{{ route('classroom.reserve') }}">
                <span>
                    <i class="bi bi-list-columns"></i>
                    Reservar aula
                </span>
            </a>
        </div>
        <div class="modulo modulo-grupo">
            <a href="{{ route('classroom.reserved') }}">
                <span>
                    <i class="bi bi-house-heart"></i>
                    Mis clases
                </span>
            </a>
        </div>
        <div class="modulo modulo-salones">
            <a href="{{ route('group.list') }}">
                <span>
                    <i class="bi bi-person-badge"></i>
                    Mis grupos
                </span>
            </a>
        </div>
        <div class="modulo modulo-implementos">
            <a href="{{ route('user.logout') }}">
                <span>
                    <i class="bi bi-power"></i>
                    Cerrar sesión
                </span>
            </a>
        </div>
    @else
        <div class="modulo modulo-profesores">
            <a href="{{ route('group.list') }}">
                <span>
                    <i class="bi bi-list-columns"></i>
                    Mis grupos
                </span>
            </a>
        </div>
        <div class="modulo modulo-grupo">
            <a href="{{ route('classroom.list') }}">
                <span>
                    <i class="bi bi-calendar-event"></i>
                    Mis proximas clases
                </span>
            </a>
        </div>
        <div class="modulo modulo-salones">
            <a href="{{ route('user.profile', ['id'=>Session::get('user')->id]) }}">
                <span>
                    <i class="bi bi-person-badge"></i>
                    Mi perfil
                </span>
            </a>
        </div>
        <div class="modulo modulo-implementos">
            <a href="{{ route('user.logout') }}">
                <span>
                    <i class="bi bi-power"></i>
                    Cerrar sesión
                </span>
            </a>
        </div>
    @endif
</div>

@include('layouts.footer')