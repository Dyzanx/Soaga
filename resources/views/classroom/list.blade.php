@include('layouts.header')

<h2>Tus proximas clases</h2>

<div class="modules">
    <div class="modulo modulo-implementos">
        <a href="{{ route('user.index') }}">
            <span>
                <i class="bi bi-arrow-return-left"></i>
                Regresar
            </span>
        </a>
    </div>
</div>

<table>
    <tr>
        <th>#</th>
        <th>profesor</th>
        <th>fecha</th>
        <th>horario</th>
        <th>capacidad aula</th>
    </tr>
    @if(count($classes) != 0)
        @foreach($classes as $key=>$cl)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>
                    <a href="{{ route('teacher.detail', ['id_docente' => $cl->id_profesor]) }}" style="margin: 0px auto;" class="login-button">Ver</a>
                </td>
                <td>{{ substr($cl->horario, 0, 10) }}</td>
                <td>{{ substr($cl->horario, 11, 11) }}</td>
                <td>{{ $cl->capacidad }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td></td>
            <td></td>
            <td>No hay elementos para mostrar</td>
            <td></td>
            <td></td>
        </tr>
    @endif
</table>

@include('layouts.footer')