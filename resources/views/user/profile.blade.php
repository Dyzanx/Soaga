@include('layouts.header')

<h2>Perfil de {{ $user->nombre }}</h2>

<div class="modules">
    <div class="modulo modulo-implementos">
        <a href="{{ route('user.index') }}">
            <span>
                <i class="bi bi-arrow-return-left"></i>
                Regresar
            </span>
        </a>
    </div>
    @if($user->id == Session::get('user')->id)
        <div class="modulo modulo-x">
            <a href="{{ route('user.edit') }}">
                <span>
                    <i class="bi bi-pen"></i>
                    Editar información
                </span>
            </a>
        </div>
    @endif
</div>

<p style="text-align: justify; font-size: 23px; margin: 0px auto; width: fit-content;">
    <strong>nombre:</strong> {{ $user->nombre }} <br> 
    <strong>tipo doc:</strong> {{ $user->tipo_doc }} <br>
    <strong>num. doc:</strong> {{ $user->num_doc }} <br>
    <strong>fecha naci:</strong> {{ $user->f_naci }} <br>
    <strong>eps:</strong> {{ $user->eps }} <br>
    <strong>correo:</strong> {{ $user->correo }} <br>
    <strong>celular:</strong> {{ $user->celular }} <br>
</p>

@include('layouts.footer')