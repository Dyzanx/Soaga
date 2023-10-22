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
        <th>Fecha</th>
        <th>Horario</th>
        <th>ID Grupo</th>
        <th>Cancelar</th>
    </tr>
    @if(count($class) != 0)
        @foreach($class as $key=>$cl)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ substr($cl->horario, 0, 10) }}</td>
                <td>{{ substr($cl->horario, 11, 11) }}</td>
                <td>{{ $cl->id_grupo }}</td>
                <td>
                    <span>      
                        <a href="{{ route('classroom.clean', ['id' => $cl->id]) }}" class="table-button table-button-red" title="Anular la clase">
                            <i class="bi bi-file-earmark-x-fill"></i>
                        </a>
                    </span>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td></td>
            <td></td>
            <td>No hay elementos para mostrar</td>
            <td></td>
        </tr>
    @endif
</table>

@include('layouts.footer')