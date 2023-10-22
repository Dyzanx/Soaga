@include('layouts.header')

@if(isset($add) && !empty($add))
<h2>Agregar un nuevo docente</h2>
@else
<h2>Administración de docentes</h2>
@endif

<div class="modules" style="margin-bottom: 30px;">
    @if(isset($add) && !empty($add))
    <div class="modulo modulo-implementos">
        <a href="{{ route('teacher.index') }}">
            <span>
                <i class="bi bi-arrow-return-left"></i>
                Regresar
            </span>
        </a>
    </div>
    @else
    <div class="modulo modulo-implementos">
        <a href="{{ route('institution.index') }}">
            <span>
                <i class="bi bi-arrow-return-left"></i>
                Regresar
            </span>
        </a>
    </div>
    <div class="modulo modulo-x">
        <a href="{{ route('teacher.add') }}">
            <span>
                <i class="bi bi-plus-lg"></i>
                Agregar a la lista
            </span>
        </a>
    </div>
    @endif
</div>

@if(isset($add) && !empty($add))
<h2>Buscar</h2>
@else
<h2>Buscar profesor</h2>
@endif

<form id="search-form" style="margin-bottom: 30px;">
    <p>
        <input id="search-input" type="text" name="query" placeholder="Buscar por #doc, correo, nombre ó telefono">
    </p>
    <p>
        <input type="submit" value="Buscar">
        @if(isset($add) && !empty($add))
            @if(isset($_GET['query']))
            <a href="{{ route('teacher.add') }}" class="delete-form-search-data">Cancelar busqueda</a>
            @endif
        @else
            @if(isset($_GET['query']))
            <a href="{{ route('teacher.index') }}" class="delete-form-search-data">Cancelar busqueda</a>
            @endif
        @endif
    </p>
</form>


<table>
    <tr>
        <th>tipo doc.</th>
        <th># doc.</th>
        <th>nombre</th>
        <th>eps</th>
        <th>correo</th>
        <th>telefono</th>
        <th>fecha naci.</th>
        <th>Opcion</th>
    </tr>

    @if($teachers->count() != 0)
    @foreach($teachers as $tea)
    <tr>
        <td>{{ $tea->tipo_doc }}</td>
        <td>{{ $tea->num_doc }}</td>
        <td>{{ \Illuminate\Support\Str::limit($tea->nombre, 13, $end='...')  }}</td>
        <td>{{ $tea->eps }}</td>
        <td>{{ $tea->correo }}</td>
        <td>{{ $tea->celular }}</td>
        <td>{{ $tea->f_naci }}</td>
        <td>
            <span>
                @if(isset($add) && !empty($add))
                <a href="{{ route('teacher.change', ['id' => $tea->id,'rol'=>'profesor']) }}" class="table-button table-button-green" title="Agregar a la lista de docentes">
                    <i class="bi bi-plus"></i>
                </a>
                @else
                <a href="{{ route('teacher.change', ['id' => $tea->id,'rol'=>'estudiante']) }}" class="table-button table-button-red" title="Eliminar de la lista de docentes">
                    <i class="bi bi-trash3-fill"></i>
                </a>
                @endif
            </span>
        </td>
    </tr>
    @endforeach
    @else
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>no hay elementos para mostrar</td>
    <td></td>
    <td></td>
    <td></td>
    @endif

</table>

@include('layouts.footer')