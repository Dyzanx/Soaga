@include('layouts.header')

<h2>Administra Los implementos del aula</h2>

<div class="modules">
    <div class="modulo modulo-implementos">
        <a href="{{ route('classroom.index') }}">
            <span>
                <i class="bi bi-arrow-return-left"></i>
                Regresar
            </span>
        </a>
    </div>
    <div class="modulo modulo-x">
        <a href="{{ route('implements.create', ['id' => $id]) }}">
            <span>
                <i class="bi bi-plus-lg"></i>
                Agregar elemento
            </span>
        </a>
    </div>
</div>

<table>
    <tr>
        <th>Titulo</th>
        <th>Comentario</th>
        <th>Opciones</th>
    </tr>

    @if($implements->count() != 0)
        @foreach($implements as $imp)
        <tr>
            <td>{{ $imp->nombre }}</td>
            <td>{{ $imp->comentario }}</td>
            <td>
                <span>
                    <a href="{{ route('implements.edit', ['id' => $imp->id]) }}" class="table-button table-button-green" title="Editar información">
                        <i class="bi bi-pen"></i>
                    </a>
                    <a href="{{ route('implements.delete', ['id' => $imp->id]) }}" class="table-button table-button-red" title="Eliminar grupo">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </span>
            </td>
        </tr>
        @endforeach
    @else
        <tr>
            <td></td>
            <td><span>NO HAY ELEMENTOS DISPONIBLES</span></td>
            <td></td>
        </tr>
    @endif

</table>

@include('layouts.footer')