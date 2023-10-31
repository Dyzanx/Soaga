<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Soaga</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>

</head>

<body>
    <div class="container">
        <header class="header" id="header">
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('welcome') }}" class="soaga-logo">
                            <h1 class="princpial-title">SOAGA</h1>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('welcome') }}">Inicio</a>
                    </li>
                    @if(Session::get('institution'))
                    <li>
                        <a href="{{ route('teacher.index') }}">Profesores</a>
                    </li>
                    <li>
                        <a href="{{ route('group.index') }}">Grupos</a>
                    </li>
                    <li>
                        <a href="{{ route('classroom.index') }}">Salones</a>
                    </li>
                    @else
                    <li>
                        <a href="#services">Servicios</a>
                    </li>
                    <li>
                        <a href="#about">Sobre nosotros</a>
                    </li>
                    <li>
                        <a href="#footer">Contactanos</a>
                    </li>

                    @endif

                    @if(Session::get('institution') && !empty(Session::get('institution')))
                    <li>
                        <a href="{{ route('institution.index') }}" class="login-button">Administrar</a>
                    </li>
                    <li>
                        <a href="{{ route('institution.logout') }}" class="register-button">Salir</a>
                    </li>
                    @elseif(Session::get('teacher'))
                    <li>
                        <a href="{{ route('user.index') }}" class="login-button">Administrar</a>
                    </li>
                    <li>
                        <a href="{{ route('user.logout') }}" class="register-button">Salir</a>
                    </li>
                    @elseif(Session::get('user'))
                    <li>
                        <a href="{{ route('user.index') }}" class="login-button">Unidad</a>
                    </li>
                    <li>
                        <a href="{{ route('user.logout') }}" class="register-button">Salir</a>
                    </li>
                    @else
                    <li>
                        <a href="#" class="login-button popup-trigger" data-popup-trigger="one">Ingresar</a>
                    </li>
                    <li>
                        <a href="#" class="register-button popup-trigger" data-popup-trigger="two">Registrarse</a>
                    </li>
                    @endif
                </ul>
            </nav>
        </header>

        <div class="content">

            <div class="body-blackout"></div>
            <!-- Modals -->
            <div class="popup-modal shadow" data-popup-modal="one">
                <i class="fas fa-2x fa-times text-white bg-primary p-3 popup-modal__close"></i>
                <h2>¿Deseas iniciar sesión como...?</h2>
                <div class="cards-container">
                    <a href="{{ route('institution.enter') }}" class="login-button">Institución</a>
                    <a href="{{ route('user.enter') }}" class="register-button">Usuario</a>
                </div>
            </div>

            <div class="popup-modal shadow" data-popup-modal="two">
                <i class="fas fa-2x fa-times text-white bg-primary p-3 popup-modal__close"></i>
                <h2>¿Deseas Registrarte como...?</h2>
                <div class="cards-container">
                    <a href="{{ route('institution.register') }}" class="login-button">Institución</a>
                    <a href="{{ route('user.register') }}" class="register-button">Usuario</a>
                </div>
            </div>