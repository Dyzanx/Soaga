@include('layouts.header')

<h2>información del docente encargado</h2>

<div class="modules">
  <div class="modulo modulo-implementos">
    @if(Session::get('user'))
      <a href="{{ route('user.index') }}">
        <span>
          <i class="bi bi-arrow-return-left"></i>
          Regresar
        </span>
      </a>
    @elseif(Session::get('teacher') || Session::get('institution'))
      <a href="{{ route('group.index') }}">
        <span>
          <i class="bi bi-arrow-return-left"></i>
          Regresar
        </span>
      </a>
    @endif
  </div>
</div>

<table>
    <tr>
        <th>tipo doc.</th>
        <th># doc</th>
        <th>nombre</th>
        <th>fecha de nacimiento</th>
        <th>eps</th>
        <th>correo</th>
        <th>celular</th>
    </tr>
    <tr>
        <td>{{ $teacher->tipo_doc }}</td>
        <td>{{ $teacher->num_doc }}</td>
        <td>{{ $teacher->nombre }}</td>
        <td>{{ $teacher->f_naci }}</td>
        <td>{{ $teacher->eps }}</td>
        <td>{{ $teacher->correo }}</td>
        <td>{{ $teacher->celular }}</td>
    </tr>
</table>

@include('layouts.footer')