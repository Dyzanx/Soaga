@include('layouts.header')

<!-- {{ var_dump($groups) }} -->

<h2>Administra tus grupos</h2>

<div class="modules">
  <div class="modulo modulo-implementos">
    <a href="{{ route('institution.index') }}">
      <span>
        <i class="bi bi-arrow-return-left"></i>
        Regresar
      </span>
    </a>
  </div>
  <div class="modulo modulo-x">
    <a href="{{ route('group.create') }}">
      <span>
        <i class="bi bi-plus-lg"></i>
        Agregar nuevo grupo
      </span>
    </a>
  </div>
</div>

<table>
  <tr>
    <th>Codigo</th>
    <th>Docente</th>
    <th>Observacion</th>
    <th>Opciones</th>
  </tr>
  @foreach($groups as $gr) 
  <tr>
    <td>{{ $gr->codigo }}</td>
    <td>
      <a href="{{ route('teacher.detail', ['id_grupo'=>$gr->id, 'id_docente'=>$gr->id_docente]) }}" style="margin: 0px auto;" class="login-button popup-trigger" data-popup-trigger="{{ $gr->id_docente+2 }}">ver informacion</a>
    </td>
    <td>{{ $gr->comentario }}</td>
    <td>
      <span>
        <a href="{{ route('group.edit', ['id'=>$gr->id]) }}" class="table-button table-button-green" title="Editar información">
          <i class="bi bi-pen"></i>
        </a>
        <a href="{{ route('group.delete', ['id'=>$gr->id]) }}" class="table-button table-button-red" title="Eliminar grupo">
          <i class="bi bi-trash3-fill"></i>
        </a>
      </span>
    </td>
  </tr>
  @endforeach
</table>

@include('layouts.footer')