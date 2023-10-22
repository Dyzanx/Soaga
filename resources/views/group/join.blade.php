@include('layouts.header')

<h2>unete a un grupo</h2>

<div class="modules">
    <div class="modulo modulo-implementos">
        <a href="{{ route('group.list') }}">
            <span>
                <i class="bi bi-arrow-return-left"></i>
                Regresar
            </span>
        </a>
    </div>
</div>

<table>
    <tr>
        <th>codigo</th>
        <th>docente</th>
        <th>comentario</th>
        <th>unirse</th>
    </tr>
    @if(count($groups) != 0)
        @foreach($groups as $gr)
            <tr>
                <td>{{ $gr->codigo }}</td>
                <td><a href="{{ route('teacher.detail', ['id_docente' => $gr->id_docente]) }}" style="margin: 0px auto;" class="login-button">Ver</a></td>
                <td>{{ $gr->comentario }}</td>
                <td>
                    <span>      
                        <a href="{{ route('group.joining', ['id_grupo'=>$gr->id]) }}" class="table-button table-button-green" title="Unirte al grupo">
                        <i class="bi bi-plus"></i>
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