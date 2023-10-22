@include('layouts.header')

<h2>Tus grupos</h2>

<div class="modules">
    <div class="modulo modulo-implementos">
        <a href="{{ route('user.index') }}">
            <span>
                <i class="bi bi-arrow-return-left"></i>
                Regresar
            </span>
        </a>
    </div>
    @if(Session::get('user'))
    <div class="modulo modulo-grupo">
        <a href="{{ route('group.join') }}">
            <span>
                <i class="bi bi-plus"></i>
                Unirse
            </span>
        </a>
    </div>
    @endif
</div>

<table>
    <tr>
        <th>ID</th>
        <th>codigo</th>
        <th>comentario</th>
    </tr>
    @if(count($groups) != 0)
    @foreach($groups as $index=>$gr)
    <tr>
        <td>{{ $gr->id }}</td>
        <td>{{ $gr->codigo }}</td>
        <td>{{ $gr->comentario }}</td>
    </tr>
    @endforeach
    @else
    <tr>
        <td></td>
        <td>no hay elementos para mostrar</td>
        <td></td>
    </tr>
    @endif
</table>

@include('layouts.footer')