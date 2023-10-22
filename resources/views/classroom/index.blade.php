@include('layouts.header')

@if(Session::get('teacher'))
<h2>Agenda un aula</h2>
@else
<h2>Administra los salones</h2>
@endif


<div class="modules">
  <div class="modulo modulo-implementos">
    <a href="@if(Session::get('institution')) {{ route('institution.index') }} @else {{ route('user.index') }} @endif">
      <span>
        <i class="bi bi-arrow-return-left"></i>
        Regresar
      </span>
    </a>
  </div>
  @if(Session::get('institution'))
  <div class="modulo modulo-x">
    <a href="{{ route('classroom.create') }}">
      <span>
        <i class="bi bi-plus-lg"></i>
        Agregar nuevo salón
      </span>
    </a>
  </div>
  @endif
</div>

<table>
  <tr>
    <th>horario</th>
    <th>Grupo</th>
    <th>capacidad</th>
    <th>comentario</th>
    @if(Session::get('teacher'))
    <th>Agendar</th>
    @endif
    @if(Session::get('institution'))
    <th>admin. implementos</th>
    <th>Opciones</th>
    @endif
  </tr>

  @if($classrooms->count() != 0)
    @foreach($classrooms as $class)
    <tr>
      <td>{{ $class->horario }}</td>
      @if($class->id_grupo == '' || $class->id_grupo = NULL)
        <td>{{ 'NINGUNO' }}</td>
      @else
        <td>{{ $class->id_grupo }}</td>
      @endif
      
      <td>{{ $class->capacidad }}</td>
      <td>{{ $class->comentario }}</td>
      @if(Session::get('teacher'))
      <td>
        <a href="{{ route('classroom.classReserveForm', ['id'=>$class->id]) }}" style="margin: 0px auto;" class="login-button">Agendar</a>
      </td>
      @endif
      @if(Session::get('institution'))
      <td>
        <a href="{{ route('implements.index', ['id' => $class->id]) }}" style="margin: 0px auto;" class="login-button">Administrar</a>
      </td>
      <td>
        <span>
          <a href="{{ route('classroom.edit', ['id' => $class->id]) }}" class="table-button table-button-green" title="Editar información">
            <i class="bi bi-pen"></i>
          </a>
          <a href="{{ route('classroom.delete', ['id' => $class->id]) }}" class="table-button table-button-red" title="Eliminar grupo">
            <i class="bi bi-trash3-fill"></i>
          </a>
        </span>
      </td>
      @endif
    </tr>
    @endforeach
  @else
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><span>NO HAY ELEMENTOS DISPONIBLES</span></td>
      <td></td>
      <td></td>
    </tr>
  @endif

</table>

@include('layouts.footer')